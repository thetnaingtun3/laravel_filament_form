<div>
    <input wire:model="name" type="text">
    <input wire:model='check' type="checkbox">
    <select wire:model='greeting' multiple>
        <option>Hello</option>
        <option>Goodbye</option>
        <option>Adios</option>
    </select>
    {{ implode(', ', $greeting) }} {{ strtoupper($name) }} @if ($check)
        !
    @endif

    <form action="#" wire:submit.prevent="$set('name','Bingo')">
        <button>Reset Name</button>
    </form>

    {{ now() }}
    {{-- <button wire:click="resteName('Bingo')">Reset Name</button> --}}
    {{-- <button wire:click="resteName($event.target.innerText)">Reset Name</button> --}}
    <p><input type="button" id="btn1" value="Click to disable button." onclick="disableButton(this)" /></p>
</div>
<script type="text/javascript">
    function disableButton(btn) {
        document.getElementById(btn.id).disabled = true;

    }
    setInterval(() => {
        document.getElementById('btn1').disabled = false;
    }, 5000);
</script>
