<x-layout>
  {{-- HERO --}}
  <main class="py-10">
    <section class="mx-auto px-4 flex flex-col items-center gap-4 max-w-[650px] mb-80 mt-50">
      <h1 class="text-[50px] leading-[1.2] text-center font-bold">
        Veja seus hábitos ganharem vida
      </h1>
      <p class="text-center text-lg">
        Construa a versão que você quer ser, <span class="underline"> um dia de cada vez.</span> Acompanhe, visualize e celebre cada pequena vitória.
      </p>

      <a href="{{ route('auth.register') }}" class="habit-shadow-lg habit-btn bg-habit-orange p-2 text-center">
        Começar Agora
      </a>
    </section>

    {{-- SLIDER  --}}
    <section class="w-full overflow-hidden bg-white border-y-2 mt-50">
      <div class="slider-track flex gap-6 items-center py-4">
        @for($i = 0; $i < 10; $i++)
          <div class="flex gap-3 items-center whitespace-nowrap flex-shrink-0">
            <x-icons.detail class="flex-shrink-0" />
            <p class="font-bold text-lg">
              Tenha controle dos seus hábitos
            </p>
          </div>
        @endfor
      </div>
    </section>

    {{-- FAQ --}}
    <section class="faq max-w-5xl mx-auto flex flex-col gap-8 py-40">
      <h2 class="text-3xl font-bold text-center">
        Perguntas Frequentes
      </h2>

      <article class="flex flex-col items-center gap-4">
        <x-question question="Como o rastreador me ajuda a criar novos hábitos?">
          O segredo da mudança está na visualização. Ao marcar seu progresso diariamente, você ativa o sistema de recompensa do cérebro, tornando mais difícil querer quebrar a corrente de dias consecutivos.
        </x-question>

        <x-question question="Posso acompanhar quantos hábitos eu quiser?">
          Sim! O sistema permite cadastrar múltiplos hábitos, mas recomendamos focar em 2 ou 3 por vez para garantir que você consiga manter a consistência antes de adicionar novos desafios.
        </x-question>

        <x-question question="O que acontece se eu esquecer de marcar um dia?">
          Não tem problema! O importante é a "regra de nunca falhar dois dias seguidos". Você pode visualizar seu histórico no grid e retomar o ritmo logo no dia seguinte para não perder o foco.
        </x-question>
        
        <x-question question="Como funciona o gráfico de progresso?">
          Nosso grid de contribuições funciona como o do GitHub: quanto mais você completa seus hábitos, mais preenchido fica o seu histórico anual, permitindo identificar seus meses mais produtivos.
        </x-question>
      </article>
    </section>
  </main>
</x-layout>
