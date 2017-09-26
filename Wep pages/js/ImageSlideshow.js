<script>
        startSlideShow();
        function startSlideShow(){
            intervalId = setInterval(changeImage,2000);
        }
        
        function stopSlideShow(){
            clearInterval(intervalId);
        }
        
      function changeImage() {
         
          var imageSrc = document.getElementById("image").getAttribute("src"); 
        
          var currentImageNumber = imageSrc.substring(imageSrc.lastIndexOf("/") + 1, imageSrc.lastIndexOf("/") + 2);
          
          if(currentImageNumber == 6){
              currentImageNumber = 0;
          }
          
           var newImage = "/ncImages/" + (Number(currentImageNumber) + 1) + ".jpg";
          
         // document.getElementById("").innerHTML = newImage;
          document.getElementById("image").setAttribute("src",newImage);
      }
                                             
</script>