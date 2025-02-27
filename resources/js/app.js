import './bootstrap';
import 'flowbite';
import 'livewire-sortable';

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});

