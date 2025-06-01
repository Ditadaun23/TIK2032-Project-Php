window.addEventListener('load', () => {
    const modal = document.getElementById('welcome-modal');
    const closeBtn = document.querySelector('.close-button');
  
    // Tampilkan modal setelah 1 detik
    setTimeout(() => {
      modal.style.display = 'block';
    }, 1000);
  
    // Tombol tutup
    closeBtn.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  
    // Klik di luar modal untuk menutup
    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  });