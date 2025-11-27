</div> <!-- Fecha o container-custom -->
</div> <!-- Fecha o main-content -->

<footer class="footer-brecho">
  <div class="container">
    Sistema de Gerenciamento de Brechó<br />
    Desenvolvido por <strong>Luana de Oliveira Ramos</strong> © 2025
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous">
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
<?php if(isset($mensagemToast) && $mensagemToast): ?>
    var toastEl = document.getElementById('mensagemToast');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
<?php endif; ?>
</script>

<style>
/* Rodapé grudado no fim */
.footer-brecho {
  flex-shrink: 0;
  padding: 15px 0;
  text-align: center;
  font-size: 0.9rem;
  background-color: #ffd0acff;
  border-top: 1px solid #FFBC8A;
  color: #7a5946;
  user-select: none;
  margin-top: auto; /* Isso empurra o footer para baixo */
  width: 100%;
}
</style>

</body>
</html>