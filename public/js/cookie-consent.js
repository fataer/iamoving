/**
 * Cookie Consent Manager - Versión Simplificada (2 botones)
 * RGPD / ePrivacy compliant
 */

(function() {
    'use strict';

    const COOKIE_CONSENT_KEY = 'iamoving_cookie_consent';
    const COOKIE_EXPIRY_DAYS = 365;

    // Scripts a gestionar (se cargan solo si hay consentimiento)
    const SCRIPTS = {
        analytics: [
            {
                id: 'google-analytics',
                src: 'https://www.googletagmanager.com/gtag/js?id=UA-153274977-1',
                async: true,
                onload: `window.dataLayer = window.dataLayer || [];
                         function gtag(){dataLayer.push(arguments);}
                         gtag('js', new Date());
                         gtag('config', 'UA-153274977-1');`
            },
            {
                id: 'google-maps-api',
                src: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCRPcquinY1U6_qxkfRlFENFwUEtTIs_-4&libraries=marker&v=weekly',
                async: true,
                defer: true,
                onload: `console.log('✅ Google Maps cargado'); 
                         window.dispatchEvent(new CustomEvent('googleMapsLoaded'));`
            }
        ],
        marketing: [
            {
                id: 'meta-pixel',
                src: 'https://connect.facebook.net/en_US/fbevents.js',
                async: true,
                inline: `
                    !function(f,b,e,v,n,t,s)
                    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                    fbq('init', window.META_PIXEL_ID || '');
                    fbq('track', 'PageView');`
            }
        ]
    };

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${JSON.stringify(value)}; expires=${date.toUTCString()}; path=/; SameSite=Lax`;
    }

    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) {
            try {
                return JSON.parse(decodeURIComponent(match[2]));
            } catch(e) {
                return null;
            }
        }
        return null;
    }

    function loadScript(scriptConfig) {
        return new Promise((resolve, reject) => {
            if (document.getElementById(scriptConfig.id)) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.id = scriptConfig.id;
            script.src = scriptConfig.src;
            script.async = scriptConfig.async !== false;
            
            if (scriptConfig.onload) {
                script.onload = () => {
                    if (scriptConfig.inline) {
                        eval(scriptConfig.inline);
                    }
                    resolve();
                };
            } else if (scriptConfig.inline) {
                script.onload = () => eval(scriptConfig.inline);
            }
            
            script.onerror = reject;
            document.head.appendChild(script);
        });
    }

    function loadConsentedScripts(consent) {
        if (consent.analytics) {
            SCRIPTS.analytics.forEach(script => loadScript(script).catch(console.warn));
        }
        if (consent.marketing) {
            SCRIPTS.marketing.forEach(script => loadScript(script).catch(console.warn));
        }
    }

    function saveConsent(analyticsConsent, marketingConsent) {
        const consentToSave = {
            necessary: true,
            analytics: analyticsConsent || false,
            marketing: marketingConsent || false,
            timestamp: new Date().toISOString()
        };
        
        setCookie(COOKIE_CONSENT_KEY, consentToSave, COOKIE_EXPIRY_DAYS);
        
        document.dispatchEvent(new CustomEvent('cookieConsentUpdated', { detail: consentToSave }));
        
        loadConsentedScripts(consentToSave);
        
        return consentToSave;
    }

    function getCurrentConsent() {
        const saved = getCookie(COOKIE_CONSENT_KEY);
        if (saved && saved.timestamp) {
            return {
                necessary: true,
                analytics: saved.analytics || false,
                marketing: saved.marketing || false
            };
        }
        return null;
    }

// Inicializar el banner UI
function initBanner() {
    // Verificar si ya hay consentimiento guardado
    const existingConsent = getCurrentConsent();
    if (existingConsent) {
        loadConsentedScripts(existingConsent);
        return;
    }

    // Crear el banner dinámicamente
    const bannerHtml = `
        <div class="cookie-consent" id="cookieConsentBanner">
            <div class="cookie-consent-content">
                <h3>🍪 Gestión de cookies</h3>
                <p>Utilizamos cookies propias y de terceros para mejorar tu experiencia, analizar el tráfico y mostrar publicidad personalizada. Puedes aceptar todas, rechazar las no esenciales o configurarlas a tu gusto.</p>
                
                <div class="cookie-consent-buttons">
                    <button class="cookie-consent-btn cookie-consent-btn-primary" id="acceptAllCookies">Aceptar todas</button>
                    <button class="cookie-consent-btn cookie-consent-btn-secondary" id="rejectOptionalCookies">Rechazar no esenciales</button>
                    <button class="cookie-consent-btn cookie-consent-btn-secondary" id="customizeCookiesBtn">Configurar</button>
                </div>
                
                <a href="/politicas_cookies" class="cookie-consent-link" target="_blank">📄 Más información sobre cookies</a>
                
                <div id="cookieSettingsPanel" style="display: none;" class="cookie-settings-panel">
                    <div class="cookie-setting-item">
                        <label>
                            <input type="checkbox" disabled checked> 
                            <strong>Cookies necesarias</strong>
                        </label>
                        <span style="font-size: 0.7rem;">Siempre activas</span>
                    </div>
                    <div class="cookie-setting-item">
                        <label>
                            <input type="checkbox" id="analyticsConsent"> 
                            <strong>Cookies analíticas</strong>
                        </label>
                        <span style="font-size: 0.7rem;">Mejoran nuestra web</span>
                    </div>
                    <div class="cookie-setting-item">
                        <label>
                            <input type="checkbox" id="marketingConsent"> 
                            <strong>Cookies publicitarias</strong>
                        </label>
                        <span style="font-size: 0.7rem;">Publicidad personalizada</span>
                    </div>
                    <button class="cookie-save-btn" id="saveCookieSettings">Guardar preferencias</button>
                </div>
            </div>
        </div>
    `;

    document.body.insertAdjacentHTML('beforeend', bannerHtml);
    
    // Mostrar con animación
    setTimeout(() => {
        const banner = document.getElementById('cookieConsentBanner');
        if (banner) banner.classList.add('show');
    }, 100);

    // Event listeners
    document.getElementById('acceptAllCookies')?.addEventListener('click', () => {
        saveConsent({ analytics: true, marketing: true });
        hideBanner();
    });
    
    document.getElementById('rejectOptionalCookies')?.addEventListener('click', () => {
        saveConsent({ analytics: false, marketing: false });
        hideBanner();
    });
    
    document.getElementById('customizeCookiesBtn')?.addEventListener('click', () => {
        const panel = document.getElementById('cookieSettingsPanel');
        if (panel) {
            panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
        }
    });
    
    document.getElementById('saveCookieSettings')?.addEventListener('click', () => {
        const analytics = document.getElementById('analyticsConsent')?.checked || false;
        const marketing = document.getElementById('marketingConsent')?.checked || false;
        saveConsent({ analytics, marketing });
        hideBanner();
    });
    
    // 🟢 NUEVO: Asegurar que los botones de WhatsApp sigan funcionando después del banner
    // Esto fuerza la reinicialización de los botones después de que el banner esté visible
    setTimeout(() => {
        // Disparar evento personalizado para que los botones se reinicialicen
        console.log('🍪 Banner de cookies cargado, notificando a los botones...');
        document.dispatchEvent(new CustomEvent('cookieBannerReady'));
    }, 500);
}

function hideBanner() {
    const banner = document.getElementById('cookieConsentBanner');
    if (banner) {
        banner.classList.remove('show');
        setTimeout(() => banner.remove(), 300);
    }
}

window.CookieConsent = {
    getConsent: getCurrentConsent,
    hasConsentFor: (category) => {
        const consent = getCurrentConsent();
        if (!consent) return false;
        return consent[category] === true;
    },
    updateConsent: saveConsent
};

// Inicializar cuando el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBanner);
} else {
    initBanner();
}

})();