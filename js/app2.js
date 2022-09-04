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
      console.log(id, id2);

      // var data = e.dataTransfer.getData("text/html");
      // var id = dragSrcEl.id;
      // var id2 = this.id;
      // var url = "http://localhost:3000/update";
      // var data = {id: id, id2: id2};
      // var xhr = new XMLHttpRequest();
      // xhr.open("POST", url, true);
      // xhr.setRequestHeader("Content-Type", "application/json");
      // xhr.onreadystatechange = function () {
      //   if (xhr.readyState === 4 && xhr.status === 200) {
      //     var json = JSON.parse(xhr.responseText);
      //     console.log(json);
      //   }
      // }



    }
    
    if (dragSrcEl != this) {
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