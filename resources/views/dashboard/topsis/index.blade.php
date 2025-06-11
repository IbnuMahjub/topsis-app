@extends('dashboard.layouts.main')

@section('content')
<div class="col d-flex align-items-stretch">
  <div class="card w-100 overflow-hidden rounded-4">
    <div class="card-body position-relative p-4">
      <h4 class="mb-4 fw-semibold">Perhitungan Metode TOPSIS</h4>

      <div class="mb-4">
        <h5 class="fw-semibold mb-3">1. Menentukan Alternatif / Pilihan</h5>
        <form id="pilihanForm">
          <div id="pilihanContainer">
            <div class="input-group mb-2">
              <input type="text" name="pilihan[]" class="form-control" placeholder="Masukkan nama pilihan (contoh: Laptop A)">
              <button type="button" class="btn btn-danger btn-sm removePilihan">Hapus</button>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-sm" id="tambahPilihan">+ Tambah Pilihan</button>
        </form>
      </div>

      <button type="button" class="btn btn-success mt-3" id="lanjutKriteria">Lanjut ke Kriteria</button>

      <div id="formKriteriaDanNilai" style="display:none;"></div>
      <div id="hasilChartContainer" style="display: none;">
        <hr>
        <h5 class="fw-semibold">Visualisasi Hasil</h5>
        <div id="chartHasilTopsis"></div>
      </div>

    </div>
  </div>
</div>

<div id="popupContainer"></div>
@endsection

@section('scripts')
<script>
  const APP_URL = "{{ env('APP_URL') }}";

  $(document).ready(function () {
    
    function aktifkanAutocomplete(inputElement) {
      $.ajax({
        url: APP_URL + '/data_karyawan',  // Mengambil data dari API alternatif
        method: 'GET',
        success: function(response) {
          if (response.success) {
            const dataList = response.data.map(item => item.name);
            $(inputElement).autocomplete({
              source: function(request, responseCallback) {
                const term = request.term.toLowerCase();
                const matches = dataList.filter(name => name.toLowerCase().includes(term));
                responseCallback(matches);
              },
              minLength: 1
            });
          } else {
            console.warn("Gagal ambil data dari API");
          }
        },
        error: function() {
          console.error("Gagal konek ke API");
        }
      });
    }

    function aktifkanAutocompleteKriteria(inputElement) {
    $.ajax({
      url: APP_URL + '/data_kriteria',
      method: 'GET',
      success: function(response) {
        console.log(response);
        if (response.success) {
          const dataKriteria = response.data;

          $(inputElement).autocomplete({
            source: dataKriteria.map(item => item.kriteria),
            minLength: 1,
            select: function(event, ui) {
              const selectedKriteria = dataKriteria.find(item => item.kriteria === ui.item.value);
              if (selectedKriteria) {
                const row = $(this).closest('.row');
                row.find('select[name="tipe[]"]').val(selectedKriteria.tipe);
                row.find('input[name="bobot[]"]').val(selectedKriteria.bobot);
              }
            }
          });
        } else {
          console.warn("Gagal ambil data dari API");
        }
      },
      error: function() {
        console.error("Gagal konek ke API");
      }
    });
  }


    aktifkanAutocomplete($('input[name="pilihan[]"]').first()); 

    // ➕ Tambah pilihan
    $('#tambahPilihan').on('click', function () {
      const newInput = $(`
        <div class="input-group mb-2">
          <input type="text" name="pilihan[]" class="form-control" placeholder="Masukkan nama pilihan">
          <button type="button" class="btn btn-danger btn-sm removePilihan">Hapus</button>
        </div>
      `);
      $('#pilihanContainer').append(newInput);
      aktifkanAutocomplete(newInput.find('input'));
    });

    $(document).on('click', '.removePilihan', function () {
      $(this).closest('.input-group').remove();
    });

    // Lanjut ke input kriteria
    $('#lanjutKriteria').on('click', function () {
      const pilihan = $('input[name="pilihan[]"]').map(function () {
        return $(this).val();
      }).get().filter(v => v !== "");

      if (pilihan.length < 2) {
        alert("Minimal masukkan 2 pilihan!");
        return;
      }

      $('#formKriteriaDanNilai').html(`
        <hr>
        <h5 class="fw-semibold mb-3">2. Menentukan Kriteria dan Nilai</h5>
        <form id="topsisForm">
          <div id="kriteriaContainer" class="mb-3">
            <div class="row mb-2">
              <div class="col">
                <input type="text" name="kriteria[]" class="form-control" placeholder="Nama Kriteria">
              </div>
              <div class="col">
                <select name="tipe[]" class="form-control">
                  <option value="benefit">Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </div>
              <div class="col">
                <input type="number" name="bobot[]" class="form-control" placeholder="Bobot (%)">
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-sm mb-3" id="tambahKriteria">+ Tambah Kriteria</button>

          <h5 class="fw-semibold mt-4">3. Nilai Alternatif</h5>
          <div id="nilaiAlternatifContainer"></div>

          <button type="submit" class="btn btn-success mt-3">Calculate TOPSIS</button>
        </form>
      `).show();

      // Aktifkan autocomplete untuk kriteria yang baru ditambahkan
      aktifkanAutocompleteKriteria($('input[name="kriteria[]"]').first());

      $(document).on('click', '#tambahKriteria', function () {
        $('#kriteriaContainer').append(`
          <div class="row mb-2">
            <div class="col">
              <input type="text" name="kriteria[]" class="form-control" placeholder="Nama Kriteria">
            </div>
            <div class="col">
              <select name="tipe[]" class="form-control">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
              </select>
            </div>
            <div class="col">
              <input type="number" name="bobot[]" class="form-control" placeholder="Bobot (%)">
            </div>
          </div>
        `);
        aktifkanAutocompleteKriteria($('input[name="kriteria[]"]').last());
      });

      $(document).on('change', 'input[name="kriteria[]"], select[name="tipe[]"], input[name="bobot[]"]', function () {
        updateNilaiAlternatif(pilihan);
      });

      updateNilaiAlternatif(pilihan);
    });

    function updateNilaiAlternatif(pilihan) {
      const kriteria = $('input[name="kriteria[]"]').map(function () {
        return $(this).val();
      }).get().filter(v => v !== "");

      let html = '<table class="table table-bordered"><thead><tr><th>Alternatif</th>';
      kriteria.forEach(k => {
        html += `<th>${k}</th>`;
      });
      html += '</tr></thead><tbody>';

      pilihan.forEach(p => {
        html += `<tr><td>${p}</td>`;
        kriteria.forEach((_, i) => {
          html += `<td><input type="number" step="any" class="form-control" name="nilai[${p}][${i}]" required></td>`;
        });
        html += '</tr>';
      });

      html += '</tbody></table>';
      $('#nilaiAlternatifContainer').html(html);
    }

    // Submit dan hitung TOPSIS
    $(document).on('submit', '#topsisForm', function (e) {
      e.preventDefault();

      const alternatif = $('input[name="pilihan[]"]').map(function () {
        return $(this).val();
      }).get().filter(v => v !== "");

      const kriteria = $('input[name="kriteria[]"]').map(function () {
        return $(this).val();
      }).get();

      const tipe = $('select[name="tipe[]"]').map(function () {
        return $(this).val();
      }).get();

      const bobot = $('input[name="bobot[]"]').map(function () {
        return parseFloat($(this).val());
      }).get();

      let nilai = {};
      alternatif.forEach(a => {
        nilai[a] = [];
        kriteria.forEach((_, i) => {
          const v = parseFloat($(`input[name="nilai[${a}][${i}]"]`).val());
          nilai[a].push(isNaN(v) ? 0 : v);
        });
      });

      const logRumus = hitungTopsisDenganRumus(nilai, bobot, tipe);
      showPopup(logRumus);
    });


    function hitungTopsisDenganRumus(nilai, bobot, tipe) {
      const alternatif = Object.keys(nilai);
      const jmlKriteria = bobot.length;
      const matrix = alternatif.map(a => nilai[a]);

      let logRumus = "";

      // 1. Pembagi Normalisasi
      let pembagi = Array(jmlKriteria).fill(0);
      for (let i = 0; i < jmlKriteria; i++) {
        pembagi[i] = Math.sqrt(matrix.reduce((sum, alt) => sum + Math.pow(alt[i], 2), 0));
      }
      logRumus += `<h6>1️⃣ Pembagi Normalisasi:</h6><ul>`;
      pembagi.forEach((val, i) => {
        logRumus += `<li>Pembagi kriteria ${i+1}: √(${matrix.map(a => a[i] + "²").join(" + ")}) = ${val.toFixed(4)}</li>`;
      });
      logRumus += `</ul>`;

      // 2. Matriks Normalisasi
      let matriksNormal = matrix.map(baris => baris.map((val, i) => val / (pembagi[i] || 1)));
      logRumus += `<h6>2️⃣ Matriks Normalisasi:</h6><table class="table table-sm"><thead><tr><th>Alternatif</th>${[...Array(jmlKriteria)].map((_, i) => `<th>K${i+1}</th>`).join("")}</tr></thead><tbody>`;
      matriksNormal.forEach((baris, idx) => {
        logRumus += `<tr><td>${alternatif[idx]}</td>${baris.map(v => `<td>${v.toFixed(4)}</td>`).join("")}</tr>`;
      });
      logRumus += `</tbody></table>`;

      // 3. Matriks Normalisasi Terbobot
      let matriksTertimbang = matriksNormal.map(baris => baris.map((val, i) => val * bobot[i]));
      logRumus += `<h6>3️⃣ Matriks Tertimbang:</h6><table class="table table-sm"><thead><tr><th>Alternatif</th>${[...Array(jmlKriteria)].map((_, i) => `<th>K${i+1}</th>`).join("")}</tr></thead><tbody>`;
      matriksTertimbang.forEach((baris, idx) => {
        logRumus += `<tr><td>${alternatif[idx]}</td>${baris.map(v => `<td>${v.toFixed(4)}</td>`).join("")}</tr>`;
      });
      logRumus += `</tbody></table>`;

      // 4. Solusi Ideal Positif & Negatif
      let idealPositif = [], idealNegatif = [];
      for (let i = 0; i < jmlKriteria; i++) {
        const kolom = matriksTertimbang.map(b => b[i]);
        idealPositif[i] = tipe[i] === "benefit" ? Math.max(...kolom) : Math.min(...kolom);
        idealNegatif[i] = tipe[i] === "benefit" ? Math.min(...kolom) : Math.max(...kolom);
      }
      logRumus += `<h6>4️⃣ Solusi Ideal:</h6><ul>`;
      idealPositif.forEach((val, i) => {
        logRumus += `<li>A⁺ K${i+1}: ${val.toFixed(4)} | A⁻ K${i+1}: ${idealNegatif[i].toFixed(4)}</li>`;
      });
      logRumus += `</ul>`;

      // 5. Jarak ke Ideal
      const hasil = alternatif.map((alt, idx) => {
        const dPlus = Math.sqrt(matriksTertimbang[idx].reduce((sum, val, i) => sum + Math.pow(val - idealPositif[i], 2), 0));
        const dMin = Math.sqrt(matriksTertimbang[idx].reduce((sum, val, i) => sum + Math.pow(val - idealNegatif[i], 2), 0));
        const nilaiPreferensi = dMin / (dMin + dPlus);
        logRumus += `<h6>5️⃣ Jarak ${alt}:</h6>`;
        logRumus += `<ul><li>D⁺: √(${matriksTertimbang[idx].map((val, i) => `(${val.toFixed(4)}-${idealPositif[i].toFixed(4)})²`).join(" + ")}) = ${dPlus.toFixed(4)}</li>`;
        logRumus += `<li>D⁻: √(${matriksTertimbang[idx].map((val, i) => `(${val.toFixed(4)}-${idealNegatif[i].toFixed(4)})²`).join(" + ")}) = ${dMin.toFixed(4)}</li>`;
        logRumus += `<li>V: ${dMin.toFixed(4)} / (${dMin.toFixed(4)} + ${dPlus.toFixed(4)}) = ${nilaiPreferensi.toFixed(4)}</li></ul>`;
        return { nama: alt, nilai: nilaiPreferensi };
      });

      // 6. Urutkan Hasil
      const hasilSort = hasil.sort((a, b) => b.nilai - a.nilai);

      // Tambahkan hasil akhir ke logRumus
      logRumus += `<h5>🔥 Hasil Akhir:</h5><ul>`;
      hasilSort.forEach(h => {
        logRumus += `<li><b>${h.nama}</b>: ${h.nilai.toFixed(4)}</li>`;
      });
      logRumus += `</ul><p><strong>Rekomendasi terbaik:</strong> ${hasilSort[0].nama}</p>`;

      return logRumus;
    }


    function showPopup(content) {
        const popup = `
          <div class="card position-fixed top-50 start-50 translate-middle p-4 bg-white shadow rounded-4 border"
              style="z-index:1051; width: 90%; max-width: 1200px; max-height: 90vh; overflow-y: auto;" id="popupCard">
            <div style="position: sticky; top: 0; z-index: 2; padding-bottom: 1rem;">
              <h4 class="fw-bold mb-3">Detail Perhitungan TOPSIS</h4>
              <button class="btn btn-danger btn-sm" id="closePopup">Tutup</button>
              <hr>
            </div>
            <div style="padding-bottom: 2rem;">
              ${content}
            </div>
          </div>
        `;
        $('#popupContainer').html(popup);
      }



    $(document).on('click', '#closePopup', function () {
      $('#popupOverlay').remove();
      $('#popupCard').remove();
    });

  });
</script>
@endsection
