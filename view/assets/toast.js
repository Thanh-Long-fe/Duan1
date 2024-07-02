function toast({
    title = "",
    message = "",
    type = 'success',
    duration = 3000
  }){
    const main = document.getElementById("toast_");
    if (main) {
      const toast = document.createElement('div');
      const icons = {
        success: 'bi bi-check-circle-fill',
        error: 'bi bi-exclamation-circle-fill'
      }
      const icon = icons[type];
      toast.classList.add('toast_',`toast--${type}`);

      toast.innerHTML = `
      <div class="toast__icon">
        <i class="${icon}"></i>
      </div>
      <div class="toast__body">
        <h3 class="toast__title">${title}</h3>
        <p class="toast__msg">${message}</p>
      </div>
      <div class="toast__close">
        <i class="bi bi-x-lg"></i>
      </div>
      `
      main.appendChild(toast)
    }

  }
