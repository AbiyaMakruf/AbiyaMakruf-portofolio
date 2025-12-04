<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>[x-cloak]{display:none !important;}</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.createElement('div');
    modal.id = 'confirm-modal';
    modal.style.position = 'fixed';
    modal.style.inset = '0';
    modal.style.display = 'none';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modal.style.backdropFilter = 'blur(6px)';
    modal.style.background = 'rgba(15,23,42,0.45)';
    modal.style.zIndex = '9999';

    modal.innerHTML = `
        <div style="background:white; border-radius:16px; padding:20px; width:320px; box-shadow:0 20px 50px rgba(0,0,0,0.2);">
            <div id="confirm-message" style="color:#0f172a; font-weight:700; font-size:16px; margin-bottom:12px;">Are you sure?</div>
            <div style="display:flex; justify-content:flex-end; gap:8px;">
                <button type="button" id="confirm-cancel" style="border:1px solid #e2e8f0; border-radius:8px; padding:8px 12px; background:white; color:#475569;">Cancel</button>
                <button type="button" id="confirm-yes" style="border:none; border-radius:8px; padding:8px 12px; background:#dc2626; color:white;">Delete</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);

    let pendingForm = null;

    function openConfirm(form, message) {
        pendingForm = form;
        modal.querySelector('#confirm-message').textContent = message || 'Are you sure?';
        modal.style.display = 'flex';
    }
    function closeConfirm() {
        modal.style.display = 'none';
        pendingForm = null;
    }

    modal.querySelector('#confirm-cancel').addEventListener('click', closeConfirm);
    modal.querySelector('#confirm-yes').addEventListener('click', () => {
        if (pendingForm) pendingForm.submit();
        closeConfirm();
    });
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeConfirm();
    });

    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('[data-confirm]');
        if (!trigger) return;
        const form = trigger.closest('form');
        if (!form) return;
        e.preventDefault();
        openConfirm(form, trigger.dataset.confirm);
    });
});
</script>
