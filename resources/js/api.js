import axios from 'axios';

const api = axios.create({
    // baseURL: '/admin', // adjust if needed
    timeout: 10000,
});

// Global error handler
api.interceptors.response.use(
    response => response,
    error => {

        if (!error.response) {
            showToast('error', 'Network error! Check internet.');
            return Promise.reject(error);
        }

        const status = error.response.status;

        // Get message from backend if available
        let msg = error.response.data?.message || '';

        if (status === 401) {
            showToast('error', msg || 'Session expired.');
        }
        else if (status === 403) {
            showToast('error', msg || 'Unauthorized.');
        }
        else if (status === 500) {
            showToast('error', msg || 'Server error.');
        }

        return Promise.reject(error);
    }
);

export default api;
