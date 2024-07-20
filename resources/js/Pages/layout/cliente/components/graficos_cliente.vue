<template>
  <div class="flex flex-wrap -mx-4">
    <!-- Gráfico de Clientes Ativos -->
    <div class="w-full md:w-1/3 px-4 mb-4">
      <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 flex items-center justify-center bg-blue-100 rounded-full">
            <i class="ri-user-line text-blue-500 text-xl"></i>
          </div>
          <div class="ml-3">
            <p class="text-lg font-semibold">{{ clientesAtivos }}</p>
            <h5 class="text-gray-600">Clientes Ativos</h5>
          </div>
        </div>
        <div class="w-chart">
          <apexchart type="area" :options="chartOptionsAtivos" :series="seriesAtivos" />
        </div>
      </div>
    </div>

    <!-- Gráfico de Clientes Inativos -->
    <div class="w-full md:w-1/3 px-4 mb-4">
      <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 rounded-full">
            <i class="ri-user-unfollow-line text-yellow-500 text-xl"></i>
          </div>
          <div class="ml-3">
            <p class="text-lg font-semibold">{{ clientesInativos }}</p>
            <h5 class="text-gray-600">Clientes Inativos</h5>
          </div>
        </div>
        <div class="w-chart">
          <apexchart type="area" :options="chartOptionsInativos" :series="seriesInativos" />
        </div>
      </div>
    </div>

    <!-- Gráfico de Clientes Cadastrados -->
    <div class="w-full md:w-1/3 px-4 mb-4">
      <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 flex items-center justify-center bg-green-100 rounded-full">
            <i class="ri-user-add-line text-green-500 text-xl"></i>
          </div>
          <div class="ml-3">
            <p class="text-lg font-semibold">{{ clientesCadastrados }}</p>
            <h5 class="text-gray-600">Clientes Cadastrados</h5>
          </div>
        </div>
        <div class="w-chart">
          <apexchart type="area" :options="chartOptionsCadastrados" :series="seriesCadastrados" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import VueApexCharts from 'vue3-apexcharts';

const clientesAtivos = ref(123); // Valor fictício
const clientesInativos = ref(45); // Valor fictício
const clientesCadastrados = ref(200); // Valor fictício

const seriesAtivos = ref([{
  name: 'Clientes Ativos',
  data: [30, 40, 35, 50, 49, 60, 70]
}]);

const chartOptionsAtivos = ref({
  chart: {
    type: 'area',
    height: 70,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    curve: 'smooth',
    width: 2
  },
  xaxis: {
    labels: {
      show: false
    }
  },
  yaxis: {
    min: 0
  },
  colors: ['#1b55e2'],
  tooltip: {
    x: {
      show: false
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      type: 'vertical',
      shadeIntensity: 1,
      inverseColors: false,
      opacityFrom: 0.4,
      opacityTo: 0.05,
      stops: [45, 100]
    }
  }
});

const seriesInativos = ref([{
  name: 'Clientes Inativos',
  data: [20, 30, 25, 40, 39, 50, 60]
}]);

const chartOptionsInativos = ref({
  chart: {
    type: 'area',
    height: 70,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    curve: 'smooth',
    width: 2
  },
  xaxis: {
    labels: {
      show: false
    }
  },
  yaxis: {
    min: 0
  },
  colors: ['#f39c12'],
  tooltip: {
    x: {
      show: false
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      type: 'vertical',
      shadeIntensity: 1,
      inverseColors: false,
      opacityFrom: 0.4,
      opacityTo: 0.05,
      stops: [45, 100]
    }
  }
});

const seriesCadastrados = ref([{
  name: 'Clientes Cadastrados',
  data: [44, 55, 41, 67]
}]);

const chartOptionsCadastrados = ref({
  chart: {
    type: 'area',
    height: 70,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    curve: 'smooth',
    width: 2
  },
  xaxis: {
    labels: {
      show: false
    }
  },
  yaxis: {
    min: 0
  },
  colors: ['#2ecc71'],
  tooltip: {
    x: {
      show: false
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      type: 'vertical',
      shadeIntensity: 1,
      inverseColors: false,
      opacityFrom: 0.4,
      opacityTo: 0.05,
      stops: [45, 100]
    }
  }
});
</script>

<style scoped>
.w-chart {
  min-height: 100px;
}
</style>
