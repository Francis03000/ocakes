//Drag'n Drop functions
// function allowDrop(ev) 
// {
//     ev.preventDefault();
// }

// function drag(ev) 
// {
//     ev.dataTransfer.setData("text", ev.target.id);
//     ev.dataTransfer.effectAllowed = "copy";
// }

// function drop(ev) 
// {
//     ev.preventDefault();
//     var data = ev.dataTransfer.getData("text");
//     var copyimg = document.createElement("img");
//     var parent = document.createElement("conteudo");
//     var original = document.getElementById(data);
//     copyimg.src = original.src;
//     copyimg.setAttribute("id", "ball");

//     // var shiftX = ev.clientX -copyimg.getBoundingClientRect().left;
//     // var shiftY = ev.clientY -copyimg.getBoundingClientRect().top;
//     // copyimg.style.position = "absolute";
//     // copyimg.style.height = "50";
//     // copyimg.style.width = "50";
//     // copyimg.style.zIndex = 1000;
//     // document.body.append(copyimg);
//     // moveAt(ev.pageX, ev.pageY);
//     // copyimg.style.left = pageX - shiftX +"px";
//     // copyimg.style.top = pageY - shiftY +"px";
//     // document.addEventListener('mousemove', onMouseMove);
//     // document.removeEventListener('mousemove', onMouseMove);
//     // copyimg.onmouse = null;

//     copyimg.style.position = "absolute";
//     copyimg.style.height = "50px";
//     copyimg.style.width = "50px";
//     copyimg.style.left = ev.clientX - ev.target.offsetLeft+"px";
//     copyimg.style.top = ev.clientY - ev.target.offsetTop+"px";
    
//     ev.target.appendChild(copyimg);

// }

let currentDroppable = null;
    ball.onmousedown = function(event) {

    let shiftX = event.clientX - ball.getBoundingClientRect().left;
    let shiftY = event.clientY -ball.getBoundingClientRect().top;

    ball.style.position = 'absolute';
    ball.style.zIndex = 1000;
    document.body.append(ball);

    moveAt(event.pageX, event.pageY);

    function moveAt(pageX, pageY) {
      ball.style.left = pageX - shiftX + 'px';
      ball.style.top = pageY - shiftY + 'px';
    }

    function onMouseMove(event) {
      moveAt(event.pageX, event.pageY);

      ball.hidden = true;
      let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
      ball.hidden = false;

      if (!elemBelow) return;

      let droppableBelow = elemBelow.closest('.droppable');
      if (currentDroppable != droppableBelow) {
        if (currentDroppable) { // null when we were not over a droppable before this event
          leaveDroppable(currentDroppable);
        }
        currentDroppable = droppableBelow;
        if (currentDroppable) { // null if we're not coming over a droppable now
          // (maybe just left the droppable)
          enterDroppable(currentDroppable);
        }
      }
    }

    document.addEventListener('mousemove', onMouseMove);

    ball.onmouseup = function() {
      document.removeEventListener('mousemove', onMouseMove);
      ball.onmouseup = null;
    };

  };

  function enterDroppable(elem) {
    elem.style.background = 'pink';
  }

  function leaveDroppable(elem) {
    elem.style.background = '';
  }

  ball.ondragstart = function() {
    return false;
  };





  // ball1.onmousedown = function(event) {

  //   let shiftX = event.clientX - ball1.getBoundingClientRect().left;
  //   let shiftY = event.clientY - ball1.getBoundingClientRect().top;

  //   ball1.style.position = 'absolute';
  //   ball1.style.zIndex = 1000;
  //   document.body.append(ball1);

  //   moveAt(event.pageX, event.pageY);

  //   function moveAt(pageX, pageY) {
  //     ball1.style.left = pageX - shiftX + 'px';
  //     ball1.style.top = pageY - shiftY + 'px';
  //   }

  //   function onMouseMove(event) {
  //     moveAt(event.pageX, event.pageY);

  //     ball1.hidden = true;
  //     let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
  //     ball1.hidden = false;

  //     if (!elemBelow) return;

  //     let droppableBelow = elemBelow.closest('.droppable');
  //     if (Droppable != droppableBelow) {
  //       if (Droppable) { // null when we were not over a droppable before this event
  //         leaveDroppable(currentDDroppableroppable);
  //       }
  //       Droppable = droppableBelow;
  //       if (Droppable) { // null if we're not coming over a droppable now
  //         // (maybe just left the droppable)
  //         enterDroppable(Droppable);
  //       }
  //     }
  //   }

  //   document.addEventListener('mousemove', onMouseMove);

  //   ball1.onmouseup = function() {
  //     document.removeEventListener('mousemove', onMouseMove);
  //     ball1.onmouseup = null;
  //   };

  // };

  // function enterDroppable(elem) {
  //   elem.style.background = 'pink';
  // }

  // function leaveDroppable(elem) {
  //   elem.style.background = '';
  // }

  // ball1.ondragstart = function() {
  //   return false;
  // };