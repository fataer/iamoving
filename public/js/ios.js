// Detectar si es iOS
const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (isIOS) {
  // Configuración específica para iOS
  const dropdownConfig = {
    placement: 'bottom-start',
    modifiers: {
      computeStyle: {
        gpuAcceleration: false, // Deshabilitar aceleración GPU en iOS
      },
      preventOverflow: {
        enabled: true,
        boundariesElement: 'viewport'
      },
      flip: {
        enabled: false // Prevenir que el menú cambie de posición
      },
      offset: {
        enabled: true,
        offset: '0, 0' // Resetear cualquier offset
      }
    }
  };

  // Aplicar la configuración a los dropdowns
  const dropdowns = document.querySelectorAll('.nav-item.dropdown');
  dropdowns.forEach(dropdown => {
    const menu = dropdown.querySelector('.dropdown-menu');
    if (menu) {
      // Crear nueva instancia de Popper con la configuración específica
      new Popper(dropdown, menu, dropdownConfig);
    }
  });

  // Estilos CSS específicos para iOS
  const iosStyles = document.createElement('style');
  iosStyles.textContent = `
    @supports (-webkit-touch-callout: none) {
      .nav-item.dropdown {
        position: relative !important;
      }
      
      .nav-item.dropdown .dropdown-menu {
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        transform: none !important;
        margin-top: 5px !important;
        width: auto !important;
        min-width: 200px;
      }

      .dropdown-menu {
        display: none;
      }

      .dropdown.show .dropdown-menu {
        display: block !important;
      }

      /* Resetear estilos que pueden estar causando el problema */
      .main-menu .dropdown-menu {
        top: 100% !important;
        left: 0 !important;
        margin: 0 !important;
        transform: none !important;
      }
    }
  `;
  document.head.appendChild(iosStyles);
}