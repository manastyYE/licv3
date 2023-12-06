<div wire:init="loadPdf('{{ asset($pdfPath) }}')">
    <div id="pdf-viewer"></div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.emit('init');
    });

    Livewire.on('loadPdf', function (pdfPath) {
        new PDFObject({ url: pdfPath }).embed('pdf-viewer');
    });
</script>
