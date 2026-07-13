<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div class="app-layout">
        
        {{-- Sidebar --}}
        <x-sidebar /> 
        
        <div class="app-main">
            
            {{-- Navbar --}}
            <x-navbar />

            <main class="app-content">

                @yield('content')

            </main>

        </div>

    </div>
</body>

</html>
