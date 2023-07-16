// Customize toastr options
toastr.options = {
    timeOut: 5000,      // Time duration for the toast to be shown (in milliseconds)
    extendedTimeOut: 1000,
    tapToDismiss: true, // Allow users to dismiss by clicking the toast
    positionClass: 'toast-top-right', // Position of the toast container
  };

  // Function to create a custom toast template
  function createCustomToast(message, type) {
    const toast = document.createElement('div');
    toast.classList.add('toast-notification');
    toast.classList.add(`toast-${type}`);
    toast.innerHTML = `
      <span class="toast-close">&times;</span>
      <div>${message}</div>
    `;
    return toast;
  }

  // Override toastr methods with custom implementation
  ['success', 'error', 'warning', 'info'].forEach((type) => {
    const originalMethod = toastr[type];

    toastr[type] = function (message, title, optionsOverride) {
      const container = document.getElementById('toast-container');
      const toast = createCustomToast(message, type);
      container.appendChild(toast);

      // Handle close button click event
      const closeBtn = toast.querySelector('.toast-close');
      closeBtn.addEventListener('click', function () {
        container.removeChild(toast);
      });

      // Remove the toast after the specified time
      setTimeout(function () {
        container.removeChild(toast);
      }, toastr.options.timeOut);

      // Call the original toastr method
      originalMethod(message, title, optionsOverride);
    };
  });

  // Example usage
  toastr.success('Success notification');
  toastr.error('Error notification');
  toastr.warning('Warning notification');
  toastr.info('Info notification');
