// src/api.js
const API_URL = "http://localhost:8000/api";

// Fonction pour récupérer toutes les adresses depuis l'API
export const getAllAddresses = async () => {
  const response = await fetch(`${API_URL}/addresses`);
  const data = await response.json();
  return data;
};

// Fonction pour récupérer une adresse spécifique depuis l'API
export const getAddress = async (id) => {
  const response = await fetch(`${API_URL}/addresses/${id}`);
  const data = await response.json();
  return data;
};

// Fonction pour ajouter une nouvelle adresse via l'API
export const addAddress = async (ville) => {
  const response = await fetch(`${API_URL}/addresses`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ ville }),
  });

  const data = await response.json();
  return data;
};

// Fonction pour mettre à jour une adresse via l'API
export const updateAddress = async (id, ville) => {
  const response = await fetch(`${API_URL}/addresses/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ ville }),
  });

  const data = await response.json();
  return data;
};

// Fonction pour supprimer une adresse via l'API
export const deleteAddress = async (id) => {
  const response = await fetch(`${API_URL}/addresses/${id}`, {
    method: "DELETE",
  });

  return response.ok; // Retourne true si la suppression est réussie, sinon false
};

// Fonction pour récupérer tous les contacts depuis l'API
export const getAllContacts = async () => {
  const response = await fetch(`${API_URL}/contacts`);
  const data = await response.json();
  return data;
};

// Fonction pour récupérer un contact spécifique depuis l'API
export const getContact = async (id) => {
  const response = await fetch(`${API_URL}/contacts/${id}`);
  const data = await response.json();
  return data;
};

// Fonction pour ajouter un nouveau contact via l'API
export const addContact = async (nom, prenom) => {
  const response = await fetch(`${API_URL}/contacts`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ nom, prenom }),
  });

  const data = await response.json();
  return data;
};

// Fonction pour mettre à jour un contact via l'API
export const updateContact = async (id, nom, prenom) => {
  const response = await fetch(`${API_URL}/contacts/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ nom, prenom }),
  });

  const data = await response.json();
  return data;
};

// Fonction pour supprimer un contact via l'API
export const deleteContact = async (id) => {
  const response = await fetch(`${API_URL}/contacts/${id}`, {
    method: "DELETE",
  });

  return response.ok; // Retourne true si la suppression est réussie, sinon false
};
