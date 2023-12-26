<!-- src/App.svelte -->
<script>
  // Importer les fonctions de l'API
  import { onMount } from 'svelte';
  import {
    getAllAddresses,
    getAddress,
    addAddress,
    updateAddress,
    deleteAddress,
    getAllContacts,
    getContact,
    addContact,
    updateContact,
    deleteContact,
  // @ts-ignore
  } from './api.js';

  // Déclarer les variables pour stocker les adresses et les contacts
  let addresses = [];
  let contacts = [];

  // Fonction pour charger les adresses au chargement du composant
  const loadAddresses = async () => {
    addresses = await getAllAddresses();
  };

  // Fonction pour charger les contacts au chargement du composant
  const loadContacts = async () => {
    contacts = await getAllContacts();
  };

  // Appeler les fonctions de chargement une fois que le composant est monté
  onMount(() => {
    loadAddresses();
    loadContacts();
  });

  // Fonction pour ajouter une nouvelle adresse
  const addNewAddress = async (ville) => {
    const newAddress = await addAddress(ville);
    addresses = [...addresses, newAddress];
  };

  // Fonction pour mettre à jour une adresse
  const updateAnAddress = async (id, ville) => {
    await updateAddress(id, ville);
    loadAddresses();
  };

  // Fonction pour supprimer une adresse
  const deleteAnAddress = async (id) => {
    await deleteAddress(id);
    loadAddresses();
  };

  // Fonction pour ajouter un nouveau contact
  const addNewContact = async (nom, prenom) => {
    const newContact = await addContact(nom, prenom);
    contacts = [...contacts, newContact];
  };

  // Fonction pour mettre à jour un contact
  const updateAContact = async (id, nom, prenom) => {
    await updateContact(id, nom, prenom);
    loadContacts();
  };

  // Fonction pour supprimer un contact
  const deleteAContact = async (id) => {
    await deleteContact(id);
    loadContacts();
  };
</script>

<main>
  <!-- Section pour afficher les adresses -->
  <h1>Addresses</h1>
  {#if addresses.length > 0}
    <ul>
      {#each addresses as address (address.id)}
        <li>
          {address.ville} 
          <!-- Boutons pour mettre à jour et supprimer une adresse -->
          <button on:click={() => updateAnAddress(address.id, prompt('Nouvelle ville', address.ville))}>
            Mettre à jour
          </button>
          <button on:click={() => deleteAnAddress(address.id)}>
            Supprimer
          </button>
        </li>
      {/each}
    </ul>
  {:else}
    <p>Aucune adresse disponible.</p>
  {/if}

  <!-- Section pour afficher les contacts -->
  <h1>Contacts</h1>
  {#if contacts.length > 0}
    <ul>
      {#each contacts as contact (contact.id)}
        <li>
          {contact.nom} {contact.prenom}
          <!-- Boutons pour mettre à jour et supprimer un contact -->
          <button on:click={() => updateAContact(contact.id, prompt('Nouveau nom', contact.nom), prompt('Nouveau prénom', contact.prenom))}>
            Mettre à jour
          </button>
          <button on:click={() => deleteAContact(contact.id)}>
            Supprimer
          </button>
        </li>
      {/each}
    </ul>
  {:else}
    <p>Aucun contact disponible.</p>
  {/if}

  <!-- Section pour ajouter une adresse -->
  <h2>Ajouter une adresse</h2>
  <form on:submit|preventDefault={() => addNewAddress(prompt('Ville'))}>
    <button type="submit">Ajouter</button>
  </form>

  <!-- Section pour ajouter un contact -->
  <h2>Ajouter un contact</h2>
  <form on:submit|preventDefault={() => addNewContact(prompt('Nom'), prompt('Prénom'))}>
    <button type="submit">Ajouter</button>
  </form>
</main>

<!-- Styles CSS -->
<style>
  main {
    text-align: center;
    margin: 2em;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    margin: 1em;
  }

  button {
    margin-left: 1em;
  }
</style>
