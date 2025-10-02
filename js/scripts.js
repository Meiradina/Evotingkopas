
// pilih katagori pilihan
function showSection(category) {
    document.getElementById('category-selection').style.display = 'none';
    document.getElementById('pegawai-section').style.display = category === 'pegawai' ? 'block' : 'none';
    document.getElementById('ambassador-section').style.display = category === 'ambassador' ? 'block' : 'none';
}
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah pengiriman form untuk debug
    console.log('Tombol submit ditekan');
});
