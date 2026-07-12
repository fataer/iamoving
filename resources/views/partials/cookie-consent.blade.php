{{-- Cookie Consent Banner - Versión Simplificada (2 botones) --}}
<link rel="stylesheet" href="{{ asset('css/cookie-consent.css') }}">
<script>
    window.META_PIXEL_ID = '{{ env("META_PIXEL_ID") }}';
    
    // Diferir la ejecución de scripts hasta que se tenga consentimiento
    (function() {
        window.gtagDeferred = window.gtagDeferred || function() {
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-153274977-1');
        };
        
        window.fbqDeferred = window.fbqDeferred || function() {
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', window.META_PIXEL_ID);
            fbq('track', 'PageView');
        };
        
        if (typeof window.gtag === 'undefined') {
            window.gtag = function() { window.gtagDeferred(); };
        }
        if (typeof window.fbq === 'undefined') {
            window.fbq = function() { window.fbqDeferred(); };
        }
    })();
</script>
<script src="{{ asset('js/cookie-consent.js') }}" defer></script>