//Immaginiamo il Carrello come una classe ovvero come un'entità che ha delle proprietà e dei metodi che definiscono come
// è fatta questa entità (le proprietà) e come si comporta(metodi).
//La classe Carrello è composta dalle proprietà restaurant(ovvero il ristorante a cui fanno riferimento i prodotti del carrello) e la proprietà items.
//Nel costuttore di Cart questi due parametri non sono obbligatori e c'è un default per cui se istanziamo un nuovo carrello senza passare nulla, si creerà un carrello vuoto dove restaurant è null e gli items è un array vuoto.
//La proprietà items è un array dove pusheremo i prodotti. I prodotti però non vengono pushati direttamente ma per ogni prodotto prima di pusharlo
//istanziamo un oggetto della classe ClassItem che costruiamo in base al prodotto.
//Vedi descrizione ClassItem.
//Ne consegue che quando dobbiamo pushare un prodotto nel carrello, istanziamo ClassItem passando al costruttore le proprietà restaurant(del prodotto), product(il prodotto stesso) mentre quantity (la quantità del prodotto) è una proprietà non obbligatoria quindi se non gliela passiamo avrà un default che è 1.

//Importazione classe CartItem
import CartItem from "./CartItem";

//DEFINIZIONE DELLA CLASSE CART
export default class Cart {
  //COSTRUTTORE DELLA CLASSE CART
  //Qui definiamo le proprietà da passare al costruttore quando istanzio l'oggetto Cart. Sono proprietà private(non possiamo accederci da fuori ma dobbiamo sempre fare delle getter per accederci), non obbligatorie quindi se non passate al momento dell'stanziamento dell'oggetto, prendono i valori di default.
  constructor(_restaurant = null, _items = []) {
    this._restaurant = _restaurant;
    this._items = _items;
  }

  //Getter o sorta di proprietà custom dell'oggetto Cart che mi restituisce il totale del carrello
  get amount() {
    return this._items.reduce((sum, item) => sum + item.totalPrice, 0);
  }

  //Getter o sorta di proprietà custom della classe Cart che mi restituisce il numero totale di items(oggetti della classe ClassItem che hanno tra le proprietà il prodotto e la quantità)
  get totalQuantity() {
    return this._items.reduce((sum, item) => item.quantity, 0);
  }

   //Getter o sorta di proprietà custom della classe Cart che mi restituisce la proprietà items ovvero l'array di istanze della classe ClassItem dove abbiamo i prodotti del carrello
  get items() {
    return this._items;
  }

  //Getter o sorta di proprietà custom della classe Cart che mi restituisce la proprietà restaurant dove ho salvato il riferimento del ristorante del carrello
  get restaurant() {
    return this._restaurant;
  }

  //Metodo della classe Cart che mi restituisce se il carrello è vuoto (controllando la length della proprietà items che è un array)
  isEmpty() {
    return this._items.length === 0;
  }

  //METODO FINDITEM()
  //Metodo della classe Cart che chiede come argomenti un prodotto esterno che voglio cercare se sia presente nel carrello e il ristorante del prodotto che sto cercando. Il metodo controlla prima di tutto se c'è corrispondenza tra il ristorante del prodotto e il ristorante del mio carrello. Poi lo cerca e se lo trova restituisce l'item del carrello che corrisponde a quel prodotto.
  findItem(product, productRestaurant) {
    if (this._restaurant && this._restaurant.id === productRestaurant.id) {
      return this._items.find((item) => item.product.id === product.id);
    } else {
      return null;
    }
  }

  //METODO ADDITEM()
  //Metodo della classe Cart che mi permette:
  //1. Se il carrello è vuoto (lo controllo chiamando il metodo isEmpty() di Cart) mi permette di aggiungere un nuovo prodotto al carrello. In questo caso l'aggiunta del nuovo prodotto avviene istanziando un nuovo oggetto della classe CartItem e passo al costruttore
  //il ristorante e il prodotto che verranno salvati nelle proprietà restaurante e product dell'oggetto. Non passando la quantity il default è 1.
  //2. Se il carrello non è vuoto, controllo prima che ci sia un matching tra il ristorante del prodotto che voglio aggiungere e il ristorante del carrello (salvato nella proprietà restaurant di Cart). Se c'è corrispondenza, controllo se il prodotto che voglio aggiungere sia già presente nel mio carrello chiamando il metodo di Cart findItem che mi restituisce l'item del carrello che corrisponde al prodotto che voglio aggiungere.
  //Se lo trovo allora chiamo il metodo increaseQuantity dell'item stesso (metodo della classe CartItem di cui item è un'istanza). Questo metodo mi permette di aumentare la quantità di quel prodotto (valore salvato della proprietà quantity di CartItem).
  //3. Se non c'è corrispondenza tra il ristorante del prodotto e quello del carrello, per il momento non faccio nulla.

  addItem(product, productRestaurant) {
    if (this.isEmpty()) {
      this._restaurant = productRestaurant;
      const newItem = new CartItem(product, productRestaurant);
      this._items.push(newItem);
      return true;
    } else if (this._restaurant.id === productRestaurant.id) {
      const item = this.findItem(product, productRestaurant);
      if (item) {
        item.increaseQuantity();
      } else {
        const newItem = new CartItem(product, productRestaurant);
        this._items.push(newItem);
      }
      return true;
    } else {
      return false;
    }
  }

  //METODO REMOVEITEM()
  //Metodo della classe Cart che mi permette di:
  //1. Chiamare il metodo decreaseQuantity() di item che riduce la quantità del prodotto nel carrello (diminuisce la quantity salvata nella proprietà quantity della classe CartItem di cui item è un'istanza)
  //2. Rimuovere il prodotto dal carrello se la quantity è 0 tramite uno splice fatto su items
  removeItem(item) {
    item.decreaseQuantity();
    if (item.quantity === 0) {
      const indexItem = this._items.indexOf(item);
      this._items.splice(indexItem, 1);
    }
  }

  //METODO CLEAR()
  //Metodo della classe Cart che mi permette di svuotare il carrello ovvero di riportare le proprietà di cart ai loro valori di default (come definiti nel costruttore all'inizio)
  clear() {
    this._restaurant = null;
    this._items = [];
  }

  //METODO LOADFROMSTORAGE
  //Questo metodo mi permette di riprendere il carrello salvato nel LocalStorage in modo che in seguito al ricarimento della pagina, il carrello
  //sia ancora presente. Prende come argomento il carrello salvato nel LocalStorage.
  //Il cart che si trova nel localStorage però è sottoforma di file Json quindi ho tutti i dati ma non riconosce che si tratti di un oggetto della classe Cart e a sua volta che items sono oggetti della classe CartItem quindi "perderei" tutti i metodi e le proprietà di queste classi.
  //Vado quindi a ricostruire queste istanze manualmente:
  // Assegno alla proprietà restaurant di cart, il valore di restaurant che ho nel LocalStorage
  //Faccio lo stesso con la proprietà items pushandogli dentro delle nuove istanze di CartItem ed al costruttore gli passo i valori che ho nel LocalStorage
  loadFromStorage(cartStorage) {
    this._restaurant = cartStorage._restaurant;
    cartStorage._items.forEach(item => {
      this._items.push(new CartItem(item._product, item._restaurant, item._quantity))});
  }
}
