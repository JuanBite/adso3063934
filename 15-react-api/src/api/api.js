import axios from "axios"

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
});

api.interceptors.request.use((config) => {
  const token = localStorage.getItem("authToken");
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

/* ======================
   PETS CRUD
====================== */

// LIST
export const getPets = () => api.get("/pets/list");

// SHOW
export const getPet = (id) => api.get(`/pets/show/${id}`);

// CREATE
export const createPet = (data) => api.post("/pets/store", data);

// UPDATE
export const editPet = (id, data) => api.put(`/pets/edit/${id}`, data);

// DELETE
export const deletePet = (id) => api.delete(`/pets/delete/${id}`);

export default api;