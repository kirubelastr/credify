document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('document');
    const pdfPreview = document.getElementById('pdfPreview');
  
    fileInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
  
        reader.onload = function(e) {
          const embed = document.createElement('embed');
          embed.src = e.target.result;
          embed.width = '100%';
          embed.height = '100%';
          embed.type = 'application/pdf';
  
          pdfPreview.innerHTML = '';
          pdfPreview.appendChild(embed);
        };
  
        reader.onerror = function(e) {
          console.error('Error:', e);
        };
  
        reader.readAsDataURL(file);
      }
    });
  });
  