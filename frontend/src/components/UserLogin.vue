<template>
  <div class="login-container">
    <form @submit.prevent="login" class="login-form">
      <h1>Login de administrador</h1>
      <div v-if="loading" class="loading-spinner">
        <p>Carregando...</p>
      </div>
      <div v-else>
        <div class="form-group">
          <input v-model="email" type="email" placeholder="E-mail" required>
        </div>
        <div class="form-group">
          <input v-model="password" type="password" placeholder="Senha" required>
        </div>
        <button type="submit" class="login-button">Acessar</button>
        <p v-if="errorMessage" class="error-message">{{ errorMessage }}</p>
      </div>
    </form>
  </div>
</template>

<script>
import axios from '@/plugins/axios';

export default {
  name: 'UserLogin',
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
      loading: false,
    };
  },
  methods: {
    async login() {
      this.loading = true;
      this.errorMessage = '';
      try {
        const response = await axios.post('/login', {
          email: this.email,
          password: this.password,
        });
        const token = response.data.access_token;
        if (token) {
          localStorage.setItem('auth_token', token);
          this.$router.push('/dashboard');
        } else {
          throw new Error('Login failed. Please check your credentials.');
        }
      } catch (error) {
        this.errorMessage = error.message || 'Login failed. Please check your credentials.';
        console.error('Error logging in:', error);
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
body, html {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  box-sizing: border-box;
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: white;
  padding: 20px;
  box-sizing: border-box;
}

.login-form {
  background: white;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
  text-align: center;
  box-sizing: border-box;
}

.login-form h1 {
  margin-bottom: 20px;
  color: #ff6600;
  font-size: 24px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 50px;
  font-size: 16px;
  box-sizing: border-box;
}

.login-button {
  width: 100%;
  padding: 10px;
  background-color: #ff6600;
  border: none;
  color: white;
  font-size: 16px;
  border-radius: 50px;
  cursor: pointer;
  box-sizing: border-box;
}

.login-button:hover {
  background-color: #cc5200;
}

.error-message {
  margin-top: 10px;
  color: red;
}

.loading-spinner {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

/* Adjustments for large devices (L) */
@media (max-width: 1200px) {
  .login-form {
    padding: 30px;
  }

  .login-form h1 {
    font-size: 22px;
  }

  .form-group input {
    font-size: 15px;
    padding: 8px;
  }

  .login-button {
    font-size: 15px;
    padding: 8px;
  }
}

/* Adjustments for medium devices (M) */
@media (max-width: 992px) {
  .login-form {
    padding: 25px;
  }

  .login-form h1 {
    font-size: 20px;
  }

  .form-group input {
    font-size: 14px;
    padding: 8px;
  }

  .login-button {
    font-size: 14px;
    padding: 8px;
  }
}

/* Adjustments for small devices (S) */
@media (max-width: 768px) {
  .login-form {
    padding: 20px;
  }

  .login-form h1 {
    font-size: 18px;
  }

  .form-group input {
    font-size: 13px;
    padding: 7px;
  }

  .login-button {
    font-size: 13px;
    padding: 7px;
  }
}

/* Adjustments for extra-small devices (XS) */
@media (max-width: 425px) {
  .login-form {
    padding: 15px;
  }

  .login-form h1 {
    font-size: 16px;
  }

  .form-group input {
    font-size: 12px;
    padding: 6px;
  }

  .login-button {
    font-size: 12px;
    padding: 6px;
  }
}
</style>
