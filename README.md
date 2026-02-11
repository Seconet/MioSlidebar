# MioSlide Bar

![MioSlide Bar](https://github.com/Seconet/MioSlidebar/blob/main/assets/screenshot-1.png)

**Contributors:** sergiocornacchione  
**Tags:** sidebar, social, icons, floating, buttons, slidebar, custom links, dashicons  
**Requires at least:** 5.6  
**Tested up to:** 6.5  
**Stable tag:** 1.0.0  
**License:** GPL v2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

Una bellissima slidebar personalizzabile che si aggancia al lato del tuo sito WordPress. Perfetta per link social, contatti rapidi, call to action o qualsiasi altra icona tu voglia mettere in evidenza.

## 📸 Screenshots

### Pannello di Amministrazione
Configura fino a 6 icone personalizzate con link, tooltip e colori.
![Pannello di Amministrazione](/mio-slidebar/assets/screenshots/screenshot-1.png)

### Frontend - Sidebar Destra
Visualizzazione della sidebar sul lato destro del sito.
![Sidebar Destra](assets/screenshots/screenshot-2.png)

### Frontend - Sidebar Sinistra
La sidebar può essere compressa o posizionata anche sul lato sinistro 
![Sidebar Sinistra](./assets/screenshots/screenshot-3.png)

## 🚀 Descrizione

**MioSlide Bar** aggiunge una slidebar elegante e completamente personalizzabile al lato del tuo sito WordPress. Perfetta per:

- 🔗 **Link social** (Facebook, Instagram, WhatsApp, LinkedIn, X/Twitter)
- 📞 **Contatti rapidi** (telefono, email, chat)
- 🛒 **Call to action** (shop, offerte, newsletter)
- 🎨 **Qualsiasi icona** con Dashicons o Font Awesome

### ✨ Caratteristiche Principali

- **6 icone personalizzabili** - Ognuna con classe icona, URL, tooltip e colore
- **Posizione flessibile** - Scegli tra lato destro o sinistro
- **Colore di sfondo** - Personalizza il colore per abbinarlo al tuo tema
- **Tooltip intelligenti** - Testo descrittivo al passaggio del mouse
- **Toggle integrato** - Freccia per nascondere/mostrare con animazione smooth
- **Ricorda lo stato** - La preferenza dell'utente viene salvata
- **Mobile friendly** - Ridimensionamento automatico, opzione per disabilitare su mobile
- **Zero configurazioni complesse** - Interfaccia semplice e intuitiva
- **Traduzioni pronte** - .pot file incluso

### 🎯 Perché MioSlide Bar?

A differenza di altri plugin simili, MioSlide Bar è stato progettato con un focus su **semplicità** e **prestazioni**:
- ❌ Nessun page builder richiesto
- ❌ Nessuna dipendenza esterna (usa Dashicons di default)
- ❌ Nessun shortcode da ricordare
- ✅ Attiva e configura in 2 minuti
- ✅ Codice leggero e ottimizzato
- ✅ Design responsive e moderno

## 🔧 Installazione

1. **Carica il plugin**
   - Vai su **Plugin → Aggiungi nuovo → Carica plugin**
   - Seleziona `mio-slidebar.zip` e clicca "Installa ora"
   
   *Oppure*
   
   - Estrai `mio-slidebar.zip` nella cartella `/wp-content/plugins/`

2. **Attiva il plugin**
   - Vai su **Plugin → Plugin installati**
   - Trova "MioSlide Bar" e clicca "Attiva"

3. **Configura le impostazioni**
   - Nel menu WordPress, clicca su **MioSlide Bar**
   - Abilita la slidebar
   - Scegli posizione (destra/sinistra)
   - Configura le tue icone
   - Salva le impostazioni

4. **Goditi la tua nuova slidebar!**
   - Visita il frontend del tuo sito
   - La sidebar apparirà magicamente sul lato scelto

## ⚙️ Configurazione

### Impostazioni Generali
- **Enable Slidebar** - Attiva/disattiva globalmente
- **Position** - Scegli tra lato destro o sinistro
- **Background Color** - Colore di sfondo della sidebar
- **Show on Mobile** - Abilita/disabilita su dispositivi mobili

### Configurazione Icone (x6)
Ogni icona può essere personalizzata con:
- ✅ **Abilita/Disabilita** - Mostra o nascondi l'icona
- 🎨 **Classe Icona** - Dashicons (es. `dashicons dashicons-facebook`) o Font Awesome
- 🔗 **Link URL** - Dove porta il click
- 💬 **Tooltip Text** - Testo che appare al passaggio del mouse
- 🎯 **Icon Color** - Colore personalizzato per l'icona

## ❓ FAQ

### Posso aggiungere più di 5 icone?
Sì! Modifica il file `frontend-display.php` e `admin-settings.php` cambiando il numero nel ciclo `for ($i = 1; $i <= X; $i++)`.

### Funziona con Font Awesome?
Assolutamente sì! Inserisci le classi Font Awesome nel campo "Icon Class" (es. `fas fa-envelope`).

### Posso cambiare l'animazione?
Certo! Modifica le proprietà `transition` e `transform` nel file CSS per personalizzare l'animazione.

### È compatibile con i page builder?
Sì, funziona con qualsiasi tema e page builder. Viene caricato direttamente nel footer.

### Come posso tradurre il plugin?
1. Genera il file .po dalla lingua desiderata
2. Traduci le stringhe con Poedit
3. Salva come `mio-slidebar-[locale].mo` nella cartella `/languages/`

## 📋 Changelog

### 1.0.0 (2024-02-11)
* 🎉 Rilascio iniziale
* 6 icone personalizzabili
* Posizione destra/sinistra
* Toggle con animazione smooth
* Opzione mobile on/off
* Tooltip personalizzabili
* Colori personalizzati per icone e sfondo
* Ricorda stato utente con localStorage
* Codice 100% WordPress Coding Standards
* Plugin Check: 0 errori, 0 warning

## 🌟 Recensioni

Hai trovato utile questo plugin? [Lascia una recensione](https://wordpress.org/support/plugin/mio-slide-bar/reviews/#new-post) su WordPress.org!

## 🤝 Contribuisci

Il plugin è open source! Puoi contribuire su [GitHub](https://github.com/Seconet/MioSlidebar).

## 📧 Supporto

Per supporto tecnico:
- [Forum ufficiale WordPress.org](https://wordpress.org/support/plugin/mio-slide-bar)
- [Sito sviluppatore](https://seconet.it)

## 📄 Licenza

GPL v2 o successiva. Vedi file LICENSE per maggiori informazioni.

---


*Realizzato con ❤️ da [Seconet - Sergio Cornacchione](https://seconet.it)*




