@extends('layouts.app')

@section('content')
<div class="px-48">
    {{-- <h1 class="text-4xl">Search</h1> --}}
    <div class="w-2/12">
        <div>
            <div>
                <h2 class="text-xl mb-3 border-b-2">Category</h2>
                <div>
                    <input type="checkbox" id="autonomous-driving" name="autonomous-driving">
                    <label class="text-sm" for="autonomous-driving">Autonomous Driving</label>
                </div>
                <div>
                    <input type="checkbox" id="crypto" name="crypto" >
                    <label class="text-sm" for="crypto">Crypto</label>
                </div>
                <div>
                    <input type="checkbox" id="hardware" name="hardware" >
                    <label class="text-sm" for="hardware">Hardware</label>
                </div>
                <div>
                    <input type="checkbox" id="programming-languages" name="programming-languages" >
                    <label class="text-sm" for="programming-languages">Programming Languages</label>
                </div>
                <div>
                    <input type="checkbox" id="rocket-science" name="rocket-science" >
                    <label class="text-sm" for="rocket-science">Rocket Science</label>
                </div>
                <div>
                    <input type="checkbox" id="virtual-reality" name="virtual-reality" >
                    <label class="text-sm" for="virtual-reality">Virtual Reality</label>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl mb-3 border-b-2">Topics</h2>
            <div>
                <input type="checkbox" id="comma-ai" name="comma-ai">
                <label class="text-sm" for="comma-ai">Comma ai</label>
            </div>
            <div>
                <input type="checkbox" id="google-self-driving" name="google-self-driving" >
                <label class="text-sm" for="google-self-driving">Google Self Driving</label>
            </div>
            <div>
                <input type="checkbox" id="tesla-self-driving" name="tesla-self-driving" >
                <label class="text-sm" for="tesla-self-driving">Tesla Self Driving</label>
            </div>
            <div>
                <input type="checkbox" id="bitcoin" name="bitcoin" >
                <label class="text-sm" for="bitcoin">Bitcoin</label>
            </div>
            <div>
                <input type="checkbox" id="cardano" name="cardano" >
                <label class="text-sm" for="cardano">Cardano</label>
            </div>
            <div>
                <input type="checkbox" id="virtual-reality" name="virtual-reality" >
                <label class="text-sm" for="virtual-reality">Virtual Reality</label>
            </div>
            <div>
                <input class="underline" type="button" value="Show All" />
            </div>
        </div>
    </div>
</div>



@endsection

