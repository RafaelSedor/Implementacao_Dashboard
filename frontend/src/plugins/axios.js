import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: '/api',
  headers: {
    'Content-Type': 'application/json',
  },
});

axiosInstance.interceptors.response.use(
  response => response,
  error => {
    if (error.response) {
      console.error('API error', error.response);
    } else {
      console.error('Network error', error);
    }
    return Promise.reject(error);
  }
);

export default axiosInstance;
