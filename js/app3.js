document.addEventListener('DOMContentLoaded', (event) => {

  var dragSrcEl = null;
  
  function handleDragStart(e) {
    this.style.opacity = '0.4';
    
    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }

    e.dataTransfer.dropEffect = 'move';
    
    return false;
  }

  function handleDragEnter(e) {
    this.classList.add('over');
  }

  function handleDragLeave(e) {
    this.classList.remove('over');
  }

  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation(); // stops the browser from redirecting.
      // drag drop update database item dropped
      var data = e.dataTransfer.getData("text/html");
      var id = dragSrcEl.id;
      var id2 = this.id;

    }
    
    if (dragSrcEl != this) {
      // get all children of container
      var children = this.parentNode.children;
      // console.log(id);
      // console.log(id2);
      // delete item from array where id


      for (var i = 1; i < children.length+1; i++) {
        var mydiv = document.getElementById(i);
        console.log(mydiv);
        
        // console.log(i);
        if (i == id) {
          // remove div with id
          // div.parentNode.removeChild(div);
          
          console.log(id);
          console.log('remove');
        }
      }          
      // console.log(children);
      // console.log(children.length);
      // console.log(children[0].id);
      
      //  var carIndex = children.indexOf("car");//get  "car" index
      //  remove car from the colors array
      //  children.splice(carIndex, 1); // colors = ["red","blue","green"]

      console.log(children);

      // copy div to new location

      dragSrcEl.innerHTML = this.innerHTML;
      this.innerHTML = e.dataTransfer.getData('text/html');
    }
    
    return false;
  }

  function handleDragEnd(e) {
    this.style.opacity = '1';
    
    items.forEach(function (item) {
      item.classList.remove('over');
    });
  }
  
  
  let items = document.querySelectorAll('.container .box');
  items.forEach(function(item) {
    item.addEventListener('dragstart', handleDragStart, false);
    item.addEventListener('dragenter', handleDragEnter, false);
    item.addEventListener('dragover', handleDragOver, false);
    item.addEventListener('dragleave', handleDragLeave, false);
    item.addEventListener('drop', handleDrop, false);
    item.addEventListener('dragend', handleDragEnd, false);
  });
});