document.addEventListener('DOMContentLoaded', () => {

  /* 1. Toggle menu mobile */
  const toggle = document.getElementById('navToggle');
  const navbar = document.getElementById('navbar');
  if (toggle) toggle.addEventListener('click', () => navbar.classList.toggle('open'));

  /* 2. Animasi muncul saat scroll */
  const reveals = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  reveals.forEach(el => io.observe(el));

  /* 3. Counter animasi di dashboard */
  document.querySelectorAll('[data-count]').forEach(el => {
    const target = +el.dataset.count; let n = 0;
    const timer = setInterval(() => {
      n++; el.textContent = n;
      if (n >= target) clearInterval(timer);
    }, 250);
  });

  /* 4. Form deteksi: sinkron slider, pratinjau status, bar kerusakan */
  const form = document.getElementById('formDeteksi');
  if (form) {
    const confRange = document.getElementById('confidenceRange');
    const confNum   = document.getElementById('confidence_score');
    const kerRange  = document.getElementById('kerusakanRange');
    const kerNum    = document.getElementById('tingkat_kerusakan');
    const live      = document.getElementById('liveStatus');
    const bar       = document.getElementById('kerusakanBar');

    const updateStatus = () => {
      const v = parseFloat(confNum.value);
      live.className = 'live-status';
      if (isNaN(v)) { live.textContent = 'Status: –'; return; }
      if (v < 50)       { live.textContent = '❓ Tidak Pasti';        live.classList.add('gray'); }
      else if (v <= 80) { live.textContent = '⚠️ Indikasi Hama';     live.classList.add('yellow'); }
      else              { live.textContent = '🚨 Hama Terkonfirmasi'; live.classList.add('red'); }
    };
    const updateBar = () => { bar.firstElementChild.style.width = (parseFloat(kerNum.value) || 0) + '%'; };

    confRange.addEventListener('input', () => { confNum.value = confRange.value; updateStatus(); });
    confNum.addEventListener('input',  () => { confRange.value = confNum.value; updateStatus(); });
    kerRange.addEventListener('input', () => { kerNum.value = kerRange.value; updateBar(); });
    kerNum.addEventListener('input',   () => { kerRange.value = kerNum.value; updateBar(); });
    updateStatus(); updateBar();

    form.addEventListener('submit', (e) => {
      const kosong = [...form.querySelectorAll('[required]')].some(f => !f.value.trim());
      if (kosong) { e.preventDefault(); alert('Mohon lengkapi semua kolom terlebih dahulu.'); return; }
      const btn = document.getElementById('btnSubmit');
      btn.disabled = true; btn.textContent = '⏳ Memproses...';
    });
  }

  /* 5. Riwayat: pencarian & filter */
  const cari = document.getElementById('cari');
  const filter = document.getElementById('filterStatus');
  const tabel = document.getElementById('tabelRiwayat');
  if (cari && filter && tabel) {
    const rows = [...tabel.querySelectorAll('tbody tr[data-status]')];
    const info = document.getElementById('infoJumlah');
    const apply = () => {
      const q = cari.value.toLowerCase(), s = filter.value; let tampil = 0;
      rows.forEach(r => {
        const ok = r.textContent.toLowerCase().includes(q) && (!s || r.dataset.status === s);
        r.style.display = ok ? '' : 'none'; if (ok) tampil++;
      });
      info.textContent = `Menampilkan ${tampil} dari ${rows.length} data`;
    };
    cari.addEventListener('input', apply);
    filter.addEventListener('change', apply);
    apply();
  }
});
