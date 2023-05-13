const MAX_LAYERS = 10;
// Width in pixels of the bottom cake layer
const MIN_WIDTH = 125;
const MAX_WIDTH = 275;
const START_WIDTH = 200;
// Percentage of the previous layer's width to give to a layer
const LAYER_PERCENTAGE = 90;
const FLAVORS = [
  "strawberry",
  "vanilla",
  "coffee",
  "chocolate",
  "mint",
  "lemon",
  "orange",
];
const CANDLE_COLORS = [
  "candle-pink",
  "candle-blue",
  "candle-green",
  "candle-purple",
];

const SPACE_PER_CANDLE = 18;

const FROSTING_MARGIN = 3;
const BASE_MARGIN = 12;

class CakeLayer extends React.Component {
  constructor(props) {
    super(props);
    this.state = { flavorIndex: 0 };
    this.changeFlavor = this.changeFlavor.bind(this);
  }

  changeFlavor(event) {
    if (this.props.canBuild) {
      this.setState((prevState, props) => ({
        flavorIndex:
          prevState.flavorIndex < FLAVORS.length - 1
            ? prevState.flavorIndex + 1
            : 0,
      }));
    }
  }

  render() {
    const layerStyle = {
      width: this.props.width + "px",
      marginLeft: (MAX_WIDTH - this.props.width) / 2,
    };

    let frostingCount = Math.floor(
      (this.props.width + 2 * FROSTING_MARGIN) / 10
    );
    if (frostingCount % 2 == 0) {
      frostingCount++;
    }

    return (
      <button
        className={"cake-layer " + FLAVORS[this.state.flavorIndex]}
        onClick={this.changeFlavor}
        style={layerStyle}
      >
        <EdgeFrosting
          width={this.props.width}
          margin={FROSTING_MARGIN}
          count={frostingCount}
          flavor={FLAVORS[this.state.flavorIndex]}
        />
        {this.props.frostingOnBottom ? (
          <EdgeFrosting
            width={this.props.width}
            margin={BASE_MARGIN}
            count={frostingCount}
            isBottom={true}
            flavor={FLAVORS[this.state.flavorIndex]}
          />
        ) : (
          ""
        )}
      </button>
    );
  }
}

/* Edge Frosting component */
function EdgeFrosting(props) {
  var frostingParts = [];
  for (let i = 0; i < props.count; i++) {
    let partClass =
      (i % 2 == 0 ? "frosting-part" : "frosting-part-small") +
      " " +
      props.flavor;
    frostingParts.push(<div key={i} className={partClass}></div>);
  }

  const layerStyle = {
    width: props.width + 2 * props.margin + "px",
    marginLeft: -props.margin,
  };

  let myClass = "frosting-row";
  if (props.isBottom) {
    myClass += " bottom-frosting";
  }

  return (
    <div className={myClass} style={layerStyle}>
      {frostingParts}
    </div>
  );
}

class Cake extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      layers: 2,
      candles: 3,
      width: START_WIDTH,
      candlesBlownOut: false,
      canBuild: true,
      eating: false,
      eatTimer: -1,
    };
    this.addLayer = this.addLayer.bind(this);
    this.removeLayer = this.removeLayer.bind(this);
    this.addCandle = this.addCandle.bind(this);
    this.removeCandle = this.removeCandle.bind(this);
    this.addWidth = this.addWidth.bind(this);
    this.removeWidth = this.removeWidth.bind(this);
    this.beginEat = this.beginEat.bind(this);
    this.eat = this.eat.bind(this);
    this.removeAllCandles = this.removeAllCandles.bind(this);
  }

  componentDidMount() {
    // Show the cake immediately in landscape mode by scrolling down to the bottom
    const scrollElement = document.scrollingElement || document.body;
    window.scrollTo(0, scrollElement.scrollHeight);
  }

  componentWillUnmount() {
    if (this.state.eatTimer != -1) {
      window.clearInterval(this.state.eatTimer);
    }
  }

  getMaxCandles(width, layers) {
    return (
      (width * Math.pow(LAYER_PERCENTAGE / 100, layers - 1)) / SPACE_PER_CANDLE
    );
  }

  addLayer() {
    if (this.state.canBuild) {
      this.setState((prevState, props) => ({
        layers: Math.min(prevState.layers + 1, MAX_LAYERS),
        candles: Math.min(
          prevState.candles,
          this.getMaxCandles(
            prevState.width,
            Math.min(prevState.layers + 1, MAX_LAYERS)
          )
        ),
      }));
    }
  }

  removeLayer() {
    if (this.state.canBuild && this.state.layers > 0) {
      this.setState((prevState, props) => ({
        layers: Math.max(prevState.layers - 1, 1),
      }));
    }
  }

  addCandle() {
    if (this.state.canBuild && this.state.layers > 0) {
      this.setState((prevState, props) => ({
        candles: Math.min(
          prevState.candles + 1,
          this.getMaxCandles(prevState.width, prevState.layers)
        ),
      }));
    }
  }

  removeCandle() {
    if (this.state.canBuild && this.state.layers > 0) {
      this.setState((prevState, props) => ({
        candles: Math.max(prevState.candles - 1, 0),
      }));
    }
  }

  addWidth() {
    if (this.state.canBuild && this.state.layers > 0) {
      this.setState((prevState, props) => ({
        width: Math.min(prevState.width + 25, MAX_WIDTH),
      }));
    }
  }

  removeWidth() {
    if (this.state.canBuild && this.state.layers > 0) {
      this.setState((prevState, props) => ({
        width: Math.max(prevState.width - 25, MIN_WIDTH),
        candles: Math.min(
          prevState.candles,
          this.getMaxCandles(
            Math.max(prevState.width - 25, MIN_WIDTH),
            prevState.layers
          )
        ),
      }));
    }
  }

  beginEat() {
    if (this.state.canBuild && this.state.layers > 0) {
      const newEatTimer = window.setInterval(this.removeAllCandles, 1000);

      this.setState({
        candlesBlownOut: true,
        canBuild: false,
        eating: true,
        eatTimer: newEatTimer,
      });
    }
  }

  removeAllCandles() {
    window.clearInterval(this.state.eatTimer);
    const newEatTimer = window.setInterval(this.eat, 100);
    this.setState({
      eatTimer: newEatTimer,
    });
  }

  // Called repeatedly while eating
  eat() {
    if (this.state.candles > 0) {
      this.setState({
        candles: 0,
      });
    } else {
      this.setState((prevState, props) => {
        const newLayers = Math.max(prevState.layers - 1, 0);
        let finished = false;
        if (newLayers == 0) {
          // Finish eating
          finished = true;
          window.clearInterval(prevState.eatTimer);
        }
        return {
          layers: newLayers,
          canBuild: finished,
          eating: !finished,
          candlesBlownOut: !finished,
        };
      });
    }
  }

  render() {
    let renderedLayers = [];
    for (let i = 0; i < this.state.layers; i++) {
      let layerWidth = this.state.width * Math.pow(LAYER_PERCENTAGE / 100, i);
      let frostingOnBottom = i == 0;
      renderedLayers.push(
        <CakeLayer
          key={i}
          width={layerWidth}
          frostingOnBottom={frostingOnBottom}
          canBuild={this.state.canBuild}
        />
      );
    }

    let candleRowWidth =
      this.state.width *
      Math.pow(LAYER_PERCENTAGE / 100, this.state.layers - 1);

    return (
      <React.Fragment>
        {this.state.candles > 0 ? (
          <CandleRow
            width={candleRowWidth}
            count={this.state.candles}
            blownOut={this.state.candlesBlownOut}
            canBuild={this.state.canBuild}
          />
        ) : (
          ""
        )}
        <div className="cake">{renderedLayers}</div>
        <CakeControls
          addLayer={this.addLayer}
          removeWidth={this.removeWidth}
          addWidth={this.addWidth}
          removeLayer={this.removeLayer}
          addCandle={this.addCandle}
          removeCandle={this.removeCandle}
          eatAction={this.beginEat}
          canBuild={this.state.canBuild}
        />
      </React.Fragment>
    );
  }
}

/* Cake Controls component */
function CakeControls(props) {
  const buildClass = !props.canBuild ? " no-build" : "";
  return (
    <div className="cake-controls">
      <div className="direction-controls">
        <button className={"btn-up" + buildClass} onClick={props.addLayer}>
          <i className="fas fa-angle-up"></i>
        </button>
        <button
          className={"btn-narrow" + buildClass}
          onClick={props.removeWidth}
        >
          <i className="fas fa-angle-right"></i>
          <i className="fas fa-angle-left"></i>
        </button>
        <button className={"btn-wide" + buildClass} onClick={props.addWidth}>
          <i className="fas fa-angle-left"></i>
          <i className="fas fa-angle-right"></i>
        </button>
        <button className={"btn-down" + buildClass} onClick={props.removeLayer}>
          <i className="fas fa-angle-down"></i>
        </button>
      </div>
      <button className={"btn-add" + buildClass} onClick={props.addCandle}>
        <i className="fas fa-plus"></i>
      </button>
      <button
        className={"btn-remove" + buildClass}
        onClick={props.removeCandle}
      >
        <i className="fas fa-minus"></i>
      </button>
      <div className={"help-candle" + buildClass}>
        <i className="fas fa-burn"></i>
        <div className="help-candle-base"></div>
      </div>
      <button className={"btn-eat" + buildClass} onClick={props.eatAction}>
        EAT
      </button>
    </div>
  );
}

/* Plate component */
function Plate(props) {
  return (
    <div className="plate">
      <div className="plate-row">
        <div className="plate-left"></div>
        <div className="plate-top"></div>
        <div className="plate-right"></div>
      </div>
      <div className="plate-row">
        <div className="plate-base"></div>
      </div>
    </div>
  );
}

/* Candle Row component */
function CandleRow(props) {
  const rowStyle = {
    width: props.width + "px",
  };

  let candles = [];
  for (let i = 0; i < props.count; i++) {
    candles.push(
      <Candle key={i} blownOut={props.blownOut} canBuild={props.canBuild} />
    );
  }

  return (
    <div className="candle-row" style={rowStyle}>
      {candles}
    </div>
  );
}

class Candle extends React.Component {
  constructor(props) {
    super(props);
    this.state = { colorIndex: 0 };
    this.changeColor = this.changeColor.bind(this);
  }

  changeColor() {
    if (this.props.canBuild) {
      this.setState((prevState, props) => ({
        colorIndex:
          prevState.colorIndex < CANDLE_COLORS.length - 1
            ? prevState.colorIndex + 1
            : 0,
      }));
    }
  }

  render() {
    let sections = [];
    for (let i = 0; i < 4; i++) {
      let sectionClass = i % 2 == 0 ? "candle-section" : "candle-section-2";
      sections.push(
        <div
          className={sectionClass + " " + CANDLE_COLORS[this.state.colorIndex]}
          key={i}
        ></div>
      );
    }

    return (
      <div className="candle">
        <button
          className={
            "candle-stick" + " " + CANDLE_COLORS[this.state.colorIndex]
          }
          onClick={this.changeColor}
        >
          {sections}
        </button>
        <div className="wick" />
        {!this.props.blownOut ? (
          <div className="fire">
            <i className="fas fa-burn"></i>
          </div>
        ) : (
          ""
        )}
      </div>
    );
  }
}

ReactDOM.render(
  <React.Fragment>
    <Cake />
    <Plate />
  </React.Fragment>,
  document.getElementById("cake")
);
