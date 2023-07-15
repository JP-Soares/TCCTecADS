document.getElementById('foto').addEventListener('change', function(event) {
    var input = event.target;
    
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        document.getElementById('imagemPreview').src = e.target.result;
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  });