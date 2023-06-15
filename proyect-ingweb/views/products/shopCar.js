const productSection = document.querySelector('.products-section');
let total = 0;
productSection.querySelector('.shop-car').addEventListener('click', ()=>{
    document.querySelector('body').classList.add('disable-scroll');
    productSection.querySelector('.modal-overlay').classList.toggle('show-overlay');
    document.getElementById('list-shop').classList.toggle('show-shoppingModal');
    const shoppingList = document.getElementById('shopping-list');

    while (shoppingList.firstChild) {
        shoppingList.removeChild(shoppingList.firstChild);
      }

    productsPurchased.forEach((producto) => {
        total += parseInt(producto.precio);
    const productHTML = `
      <div class="product">
          <h3 class="product-model">${producto.modelo}</h3>
          <p class="product-brand">${producto.marca}</p>
          <p class="product-year">${producto.año}</p>
          <p class="product-price">S/. ${producto.precio}</p>
    </div>
      `;
        shoppingList.appendChild(
          document.createRange().createContextualFragment(productHTML)
        );
        calculateTotal(productsPurchased);
      });

    //   

});

document.getElementById('close-shoppingModal').addEventListener('click', ()=>{
    document.querySelector('body').classList.remove('disable-scroll');
    productSection.querySelector('.modal-overlay').classList.remove('show-overlay');
    document.getElementById('list-shop').classList.remove('show-shoppingModal');
});

const calculateTotal = (e)=>{
    total = 0;
    e.forEach(e=>{
        total += parseInt(e.precio);
    })
    document.querySelector('.price-total').innerHTML = 'S/. ' + total;
}


document.querySelector('.send-order').addEventListener('click', e=>{
  var mensaje = "Cotización de productos:\n\n";
  
  productsPurchased.forEach(function(producto) {
    mensaje += "Modelo: " + producto.modelo + "\n";
    mensaje += "Marca: " + producto.marca + "\n";
    mensaje += "Año: " + producto.año + "\n";
    mensaje += "Precio: $" + producto.precio + "\n\n";
  });
  
  mensaje += "Precio total: $" + total;
  
  var url = "https://wa.me/" + 967216577 + "?text=" + encodeURIComponent(mensaje);
  window.open(url);
})