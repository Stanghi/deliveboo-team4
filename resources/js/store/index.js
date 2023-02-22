import { createStore } from "vuex";

//Importo la classe Cart
import Cart from "../class/Cart.js";

// Creo la funzione per salvare il carrello (cart) nel LocaStorage o per aggiornarlo.
// La funzione prende come argomento il mio oggetto cart (che è un'istanza della classe Cart),
//lo setta nel localStorage passandoglielo non come oggetto della classe Cart ma come JSON
//Il metodo stringify() trasforma il nostro cart in un file JSON (viene fatta una deep copy ma perdiamo il fatto che si tratto di un'istanza delle nostre classi)
function updateLocalStorage(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

export default createStore({
  state: {
    //Creo la proprietà cart(carrello) dell'oggetto state che ha come valore un'istanza della classe Cart
    cart: new Cart()
  },

  //La getter dell'oggetto state mi permette di prendere da fuori il carrello salvato nella proprietà cart
  getters: {
    getCart: (state) => {
      return state.cart;
    }
  },

  //Le mutations permettono di modificare lo state e quindi anche il cart che è una sua proprietà
  mutations: {
    //Questa mutations chiama la funzione updateLocalStorage definita sopra che mi trasforma il cart in un Json e lo salva nel localStorage
    updateCart(state) {
      updateLocalStorage(state.cart);
    },

     //Questa mutations permette di riprendere i dati salvati nel localStorage e di usarli nell'applicazione.
     // Salvo in una costante il cart che è nel localStorage. Se esiste allora lo riconverto da JSON ad oggetto javascript semplice.
     //Istanzio un nuovo oggetto della classe Cart e chiamo il metodo di Cart loadFromStorage() che mi permette di trasformare l'oggetto semplice javascript in un oggetto della mia classe Cart.
    updateCartFromLocalStorage(state) {
      const cartJson =  localStorage.getItem("cart");
      if (cartJson) {
        const cartStorage = JSON.parse(cartJson);
        state.cart = new Cart();
        state.cart.loadFromStorage(cartStorage);
      }
    },
  },
  actions: {},
  modules: {},
});
