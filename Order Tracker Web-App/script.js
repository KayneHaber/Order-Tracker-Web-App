document.getElementById('calculateButton').addEventListener('click', function() {
    const noVat = parseFloat(document.getElementById('totalRetail').value);
    const vat = parseFloat(document.getElementById('VAT').value);
    const vatAmt = noVat * (vat / 100);
    const total = noVat + vatAmt;
    document.getElementById('totalIncVAT').value = total.toFixed(2);
});