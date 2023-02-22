export default class CartItem {
    constructor(_product, _quantity = 1) {
      this._product = _product;
      this._quantity = _quantity;
    }

    //Getter della classe CartItem che restituisce la proprietà privata quantity ovvero la quantità di quel prodotto nel carrello
    get quantity() {
      return this._quantity;
    }

    //Getter della classe CartItem che restituisce una sorta di proprietà custome dove salvo il prezzo totale di quel prodotto in base alla quantitò che abbiamo nel carrello
    get totalPrice() {
      return this._product.price * this._quantity;
    }

    //Getter della classe CartItem che restituisce la proprietà privata product ovvero il prodotto stesso che ho nel carrello
    get product() {
      return this._product;
    }

    //Metodo della classe CartItem che permette di aumentare la quantità del prodotto
    increaseQuantity() {
      this._quantity++;
    }

    //Metodo della classe CartItem che permette di diminuire la quantià del prodotto solo se questa è maggiore di 0
    decreaseQuantity() {
      if (this._quantity > 0) {
        this._quantity--;
      }
    }
  }
