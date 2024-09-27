
import { createApp } from 'vue';
import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css';

const app = createApp({});
app.use(Toast, {
  // Toast options here (if any)
});
