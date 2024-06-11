<template>
  <div class="dashboard-container">
    <header>
      <button class="logout-button" @click="logout">Logout</button>
    </header>
    <div v-if="dashboardData" class="dashboard-content">
      <section class="section">
        <h2>Downloads</h2>
        <div class="stat-container">
          <div class="stat-box purple">
            <p class="stat-number">{{ dashboardData.downloads.totalDownloads }}</p>
            <p>Total Downloads</p>
          </div>
          <div class="stat-box purple">
            <p class="stat-number">{{ dashboardData.downloads.totalIOS }}</p>
            <p>Total iOS</p>
          </div>
          <div class="stat-box purple">
            <p class="stat-number">{{ dashboardData.downloads.totalAndroid }}</p>
            <p>Total Android</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.downloads.conversionRate }}</p>
            <p>Conversion Rate</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.downloads.iOSAccess }}</p>
            <p>iOS Access</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.downloads.googleAccess }}</p>
            <p>Google Access</p>
          </div>
        </div>
      </section>
      <section class="section">
        <h2>Acessos Web</h2>
        <div class="stat-container">
          <div class="access-box purple">
            <p class="stat-number">{{ dashboardData.access.totalAccess }}</p>
            <p>{{ dashboardData.access.url }}</p>
          </div>
        </div>
      </section>
      <section class="section">
        <h2>Métricas</h2>
        <div class="stat-container">
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.metrics.clients }}</p>
            <p>Total de Cadastros</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.metrics.activeServices }}</p>
            <p>Músicos Ativos</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.metrics.contracts }}</p>
            <p>Perfis Completos</p>
          </div>
          <div class="stat-box orange">
            <p class="stat-number">{{ dashboardData.metrics.contractsGrowth }}</p>
            <p>Porcentagem de Crescimento</p>
          </div>
          <div class="stat-box orange">
            <p class="stat-number">{{ dashboardData.metrics.activeContracts }}</p>
            <p>Contratos Ativos</p>
          </div>
        </div>
      </section>
      <section class="section">
        <h2>Transações</h2>
        <div class="stat-container">
          <div class="stat-box white">
            <p class="stat-number">{{ dashboardData.transactions.totalTransactions }}</p>
            <p>Total de Transações</p>
          </div>
          <div class="stat-box white">
            <p class="stat-number">{{ dashboardData.transactions.totalRevenue }}</p>
            <p>Total Faturado</p>
          </div>
          <div class="stat-box white">
            <p class="stat-number">{{ dashboardData.transactions.clientCost }}</p>
            <p>Custo do Cliente</p>
          </div>
          <div class="stat-box green">
            <p class="stat-number">{{ dashboardData.transactions.legalCost }}</p>
            <p>Lucro Real</p>
          </div>
        </div>
      </section>
    </div>
    <div v-else>
      <p>Loading...</p>
    </div>
  </div>
</template>

<script>
import axios from '@/plugins/axios';

export default {
  name: 'DashboardView',
  data() {
    return {
      dashboardData: null,
    };
  },
  async created() {
    try {
      const response = await axios.get('/dashboard', {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('auth_token')}`,
        },
      });
      this.dashboardData = response.data.data;
    } catch (error) {
      console.error('Error fetching dashboard data:', error);
    }
  },
  methods: {
    logout() {
      localStorage.removeItem('auth_token');
      this.$router.push('/');
    }
  }
};
</script>

<style scoped>
.dashboard-container {
  padding: 20px;
  background: #f0f0f0;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background: linear-gradient(90deg, #600082 0%, #820056 100%);
  color: white;
  width: 100%;
}

.logout-button {
  background-color: #ff6600;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.logout-button:hover {
  background-color: #cc5200;
}

.section {
  margin-bottom: 20px;
  width: 100%;
}

.section h2 {
  margin-bottom: 20px;
  color: #600082;
}

.stat-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.stat-box {
  background: #fff;
  padding: 20px;
  margin: 10px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  flex: 1 1 calc(33.333% - 20px); 
  min-width: 250px; 
}

.access-box {
  flex: 1 1 100%;
  min-width: 250px;
}

.stat-box.green {
  border-left: 5px solid #009900;
}

.stat-box.purple {
  border-left: 5px solid #600082;
}

.stat-box.orange {
  border-left: 5px solid #ff6600;
}

.stat-box.white {
  border-left: 5px solid #ffffff;
}

.stat-box p {
  margin: 0;
  font-size: 1.2em;
}

.stat-box p:last-child {
  font-size: 0.8em;
  color: #888;
}

.stat-number {
  font-size: 2em;
  font-weight: bold;
}

@media (max-width: 1200px) {
  .section {
    margin-bottom: 15px;
  }

  .stat-box {
    padding: 18px;
  }
}

@media (max-width: 992px) {
  .section {
    margin-bottom: 10px;
  }

  .stat-box {
    padding: 16px;
  }
}

@media (max-width: 768px) {
  .dashboard-container {
    padding: 10px;
  }

  .section h2 {
    font-size: 18px;
  }

  .stat-container {
    flex-direction: column;
    align-items: center;
  }

  .stat-box {
    width: 100%;
    padding: 14px;
    margin: 8px 0;
  }
}

@media (max-width: 576px) {
  .section h2 {
    font-size: 16px;
  }

  .stat-box {
    padding: 12px;
  }

  .stat-number {
    font-size: 1.8em;
  }
}

@media (max-width: 425px) {
  .header, .dashboard-container {
    padding: 5px;
  }

  .section h2 {
    font-size: 14px;
  }

  .stat-box {
    padding: 10px;
    margin: 5px 0;
  }

  .stat-number {
    font-size: 1.6em;
  }
}
</style>
