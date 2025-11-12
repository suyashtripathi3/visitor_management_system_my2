export default function initThemeScripts() {
  // Make sure jQuery exists
  if (!window.$ || !window.jQuery) return;

  // Bootstrap-select (applies to any <select class="selectpicker">)
  try { $('.selectpicker').selectpicker(); } catch (e) {}

  // MetisMenu (sidebar)
  try { $('#menu').metisMenu(); } catch (e) {}

  // Datetimepicker (applies to any .datetimepicker input)
  try { $('.datetimepicker').datetimepicker(); } catch (e) {}

  // If your theme exposes global helpers, call them safely
  try { if (window.deznav) window.deznav.init(); } catch (e) {}
  try { if (typeof dzSettings !== 'undefined') dzSettings.reset(); } catch (e) {}
}
