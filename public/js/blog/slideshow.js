// var butonClass = document.getElementsByClassName("buttons")[0];
// var articleId = parseInt(document.getElementById('myArticleId').value);
/* global jsArray */


var Slideshow = function(container) {
   if (!container) {
      console.log('no element found');
      return;
   }
   
   var myImages = jsArray.map(function(x) {
      return "/public/uploads/" + x.name;
   });
   
   var OldmyImages = [
      '/public/uploads/imaginic9/1.jpg',
      '/public/uploads/imaginic9/777adf082fc125aa9490a3450192ec6c.jpg',
      '/public/uploads/imaginic9/COL9-6.jpg',
      '/public/uploads/imaginic9/images.jpeg'
      ];
      
  
      var imageDiv1 = document.createElement('img');
      var imageDiv2 = document.createElement('img');
      imageDiv1.setAttribute('class', 'first-image');
      //imageDiv1.setAttribute('style', ' width: 640px; height: 480px;');
      imageDiv1.setAttribute('style', 'height: 300px;');
      imageDiv2.setAttribute('class', 'second-image');
      //imageDiv2.setAttribute('style', ' width: 640px; height: 480px;');
      imageDiv2.setAttribute('style', 'height: 300px;');
      container.appendChild(imageDiv1);
      container.appendChild(imageDiv2);
      
   var image = 0;
   function afiseazaImag(str) {
      imageDiv2.style.zIndex = 101;
      imageDiv1.style.zIndex = 100;
      imageDiv2.src = str;
      imageDiv1.classList.add("fadeout");
      imageDiv2.classList.remove("fadeout");
      var ceva = imageDiv1;
      imageDiv1 = imageDiv2;
      imageDiv2 = ceva;
   }
   
   afiseazaImag(myImages[image]);
   //afiseazaImag(myImages[image],myImages[image+1] ? myImages[image+1] : myImages[myImages.length-1] );
   
   var but1 = document.createElement('button');
   but1.setAttribute('class', 'changeImg');
   but1.addEventListener('click', function() {changeIt('left')});
   var But1 = document.createTextNode("prev");
   but1.appendChild(But1);
   container.appendChild(but1);
   
   var but2 = document.createElement('button');
   but2.setAttribute('class', 'changeImg');
   but2.addEventListener('click',changeIt);
   var But2 = document.createTextNode("next");
   but2.appendChild(But2);
   container.appendChild(but2);
   
   var but3 = document.createElement('button');
   but3.setAttribute('class', 'changeImg');
   but3.addEventListener('click', function() { autoplay(); });
   var But3 = document.createTextNode("autoplay");
   but3.appendChild(But3);
   container.appendChild(but3);

   function changeIt(direction) {
      (direction === 'left') ? image-- : image++;
      if (image >= myImages.length) { image = 0 };
      if (image < 0) { image = myImages.length-1 };
      afiseazaImag(myImages[image]);
      //afiseazaImag(myImages[image],myImages[image+1] ? myImages[image+1] : myImages[0] );
   }
   
   var auto = false;
   var startSlide = null;
   
   function autoplay() {
      if (auto === true) {
         auto = false; 
         clearInterval(startSlide);
         But3.textContent = "start";
      }
      else 
      {
         auto = true;
         console.log("here i am is");
         startSlide = setInterval(function(){ changeIt(); }, 5000);
         But3.textContent = "stop";
      }
   }
   autoplay();
}
        
var myDiv = document.getElementsByClassName("slideshow")[0];

var mySlideshow = new Slideshow(myDiv);
