<script src="{{ asset('js/Admin/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/Admin/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('js/Admin/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/Admin/config.js') }}"></script>
<script src="{{ asset('js/Admin/pcoded.js') }}"></script>
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('mdb/js/mdb.min.js') }}"></script>
@yield('script')

<script>
    document.getElementById('filterDropdown').addEventListener('change', function() {
  var selectedValue = this.value;
  var listItems = document.querySelectorAll('#dataList li');
  
  listItems.forEach(function(item) {
    if (selectedValue === 'all' || item.getAttribute('data-category') === selectedValue) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});
</script>