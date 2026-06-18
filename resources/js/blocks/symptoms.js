const tabs = document.querySelectorAll('.symptoms-tab-btn');
const contents = document.querySelectorAll('.symptoms-tab-content');

if (tabs.length && contents.length) {
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const targetId = tab.getAttribute('data-tab');

      tabs.forEach(t => {
        t.classList.remove('active', 'bg-section-light');
        t.classList.add('bg-white');
      });

      contents.forEach(content => {
        content.classList.remove('block');
        content.classList.add('hidden', 'opacity-0');
      });

      tab.classList.add('active', 'bg-section-light');
      tab.classList.remove('bg-white');

      const targetContent = document.getElementById(targetId);
      if (targetContent) {
        targetContent.classList.remove('hidden', 'opacity-0');
        targetContent.classList.add('block');
      }
    });
  });
}