const product = [
            {
                image: 'img/gambar1.jpg',
                title: 'Kain Batik',
                lokasi: 'Pekalongan',
                price: 200000,
                category: 'aksesoris',
                location: 'jawaTimur'
            },
            {
              image: 'img/gambar7.jpg',
              title: 'Tas Rambat Rotan Dayak',
              lokasi: 'Palangka Raya',
              price: 55000,
              category: 'souvenir',
              location: 'kalimantanTengah'
            },
            {
              image: 'img/gambar3.jpg',
              title: 'Wayang',
              lokasi: 'Magelang',
              price: 120000,
              category: ['hobi', 'souvenir'],
              location: 'jawaTengah'
            },
            {
              image: 'img/gambar2.jpg',
              title: 'Gerabah',
              lokasi: 'Batu',
              price: 70000,
              category: 'perlengkapan',
              location: 'jawaTimur'
            },
            {
              image: 'img/gambar4.jpeg',
              title: 'Kerajinan Batu',
              lokasi: 'Pacitan',
              price: 210000,
              category: 'souvenir',
              location: 'jawaTimur'
            },
            {
              image: 'img/gambar5.jpeg',
              title: 'Kipas Tangan',
              lokasi: 'Malang',
              price: 35000,
              category: ['souvenir', 'aksesoris'],
              location: 'jawaTengah'
            },
            {
              image: 'img/gambar6.jpg',
              title: 'Toples Keramik',
              lokasi: 'Malang',
              price: 35000,
              category: ['souvenir', 'ukiran'],
              location: 'jawaTengah'
            },
            {
              image: 'img/gambar8.jpg',
              title: 'Tas Manik',
              lokasi: 'Balikpapan',
              price: 35000,
              category: ['souvenir', 'hobi', 'tas'],
              location: 'kalimantanTimur'
            },
        ];

let selectedFilters = [];

function applyFilters() {
  const lowPrice = parseInt(document.getElementById('lowPrice').value) || 0;
  const highPrice = parseInt(document.getElementById('highPrice').value) || Infinity;
  const filterLocation = document.getElementById('location').value.toLowerCase();

  const filteredProduct = product.filter(item => {
    const sameType = selectedFilters.length === 0 || selectedFilters.some(filter => {
      if (Array.isArray(item.category)) {
        return item.category.includes(filter);
      } else {
        return item.category === filter;
      }
    });

    const targetPrice = item.price >= lowPrice && item.price <= highPrice; // Use lowPrice and highPrice
    const targetLocation = filterLocation === 'all' || (item.location && item.location.toLowerCase() === filterLocation);

    return sameType && targetPrice && targetLocation;
  });

  const shuffledProducts = shuffleArray(filteredProduct);
  displayProduct(shuffledProducts);
}


  function categoryFilter(product) {
    const button = document.querySelector(`button[onclick="categoryFilter('${product}')"]`);

    if (selectedFilters.includes(product)) {
      selectedFilters = selectedFilters.filter(filter => filter !== product);
      button.classList.remove('active');
    } else {
      selectedFilters.push(product);
      button.classList.add('active');
    }
    applyFilters();
  }


function resetFilter() {
  document.getElementById('lowPrice').value='';
  document.getElementById('highPrice').value='';
  document.getElementById('filterLocation').value='all';
  applyFilters();
}

function displayProduct(items) {
  const template = document.getElementById('template').innerHTML;

  const renderedItems = items.map(item => {
    return template
      .replace('{title}', item.title)
      .replace('{image}', item.image)
      .replace('{price}', item.price)
      .replace('{lokasi}', item.lokasi);
  });

  document.getElementById('root').innerHTML = renderedItems.join('');
}


function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
}
  return array;
}

function toggleDropdown() {
  const dropdownContent = document.querySelector('.dropdown-content');
  dropdownContent.classList.toggle('open');}

window.onload = function() {
  applyFilters();
};