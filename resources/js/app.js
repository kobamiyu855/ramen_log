import './bootstrap';

// CSRFトークン
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
  }
});