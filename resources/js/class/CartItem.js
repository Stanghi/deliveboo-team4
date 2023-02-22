//Immaginiamo ogni prodotto del carrello come un oggetto/istanza della classe CartItem che definisce proprietà e metodi.
//Quando salviamo un prodotto nel carrello, non lo pushiamo così direttamente come è ma creiamo un nuovo oggetto che ha delle proprietà definite nel costruttore
//della classe CartItem (di cui appunto l'oggetto è un'istanza). Le proprietà sono tutte private (quindi esternamente possono essere raggiunte tramite delle getter): product dove salviamo il prodotto che vogliamo aggiungere al carrello, restaurant ovvero il ristorante di cui fa parte il prodotto e quantity ovvero la quantità che abbiamo nel carrello di quel prodotto. Quantity è una proprietà non obbligatoria da passare al costruttore al momento dell'istanziamento, infatti se non viene passata assume 1 come valore di default.

export default class CartItem {
    constructor(_product, _restaurant, _quantity = 1) {
      this._product = _product;
      this._restaurant = _restaurant;
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
