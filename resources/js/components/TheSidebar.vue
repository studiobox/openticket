<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { TicketIcon, ChatBubbleBottomCenterTextIcon, UserGroupIcon, UsersIcon, WrenchScrewdriverIcon, UserIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon, ChevronUpIcon } from '@heroicons/vue/24/solid';

const dropdownT = ref({
    settings: false
})

const toggleNav = (type) => {
    dropdownT.value[type] = !dropdownT.value[type];
}
</script>

<template>
    <div class="sidebar w-80 bg-white shadow-2xl z-10">
      <div class="logo p-4 border-b border-gray-100">
        <Link :href="route('home')">
            <h1 class="group text-xl md:text-2xl text-slate-900 text-left font-barlow">
                open<span class="py-1 px-2 bg-yellow-500 text-black text-xl md:text-2xl">ticket</span>
            </h1>
        </Link>
      </div>

      <nav class="side-nav flex flex-col">
          <Link :href="route('dashboard')" active-class="active" class="nav-link">
              <TicketIcon class="w-6 h-6" />
              Dashboard
          </Link>
          <Link :href="route('ticket.index')" active-class="active" class="nav-link">
              <TicketIcon class="w-6 h-6" />
              Tickets
          </Link>
          <Link :href="route('department.index')" active-class="active" class="nav-link">
              <UserGroupIcon class="w-6 h-6" />
              Departments
          </Link>
          <Link :href="route('agent.index')" active-class="active" class="nav-link">
              <UsersIcon class="w-6 h-6" />
              Agents
          </Link>
          <Link :href="route('user.index')" active-class="active" class="nav-link">
              <UserIcon class="w-6 h-6" />
              Users
          </Link>
          <!-- <Link to="/settings" active-class="bg-indigo-600 hover:bg-indigo-600 text-white" class="py-3 px-4 border-b border-gray-100 hover:bg-slate-50 flex items-center gap-2 text-base peer/settings">
              <WrenchScrewdriverIcon class="w-6 h-6" />
              Settings
          </Link> -->
          <button class="nav-link peer/settings" :class="{'dropped': dropdownT.settings}" @click="toggleNav('settings')">
            <WrenchScrewdriverIcon class="w-6 h-6" />
              Settings
            <span class="ml-auto">
                <ChevronUpIcon v-if="dropdownT.settings" class="w-6 h-6" />
                <ChevronDownIcon v-if="!dropdownT.settings" class="w-6 h-6" />
            </span>
          </button>
          <div class="sub-menu hidden flex-col peer-[.dropped]/settings:flex">
            <Link :href="route('settings.general')" active-class="active" class="nav-link">
                General Settings
            </Link>
            <Link href="#" active-class="active" class="nav-link">
                Security Settings
            </Link>
            <Link href="#" active-class="active" class="nav-link">
                Tickets Settings
            </Link>
            <Link :href="route('settings.api')" active-class="active" class="nav-link">
                API Configuration
            </Link>
          </div>
      </nav>
    </div>
</template>

<style scoped>
.nav-link {
    @apply py-3 px-4 border-b border-gray-100 hover:bg-slate-50 flex items-center gap-2 text-base
}

.nav-link.active {
    @apply bg-indigo-600 hover:bg-indigo-600 text-white
}

.nav-link.dropped {
    @apply bg-slate-100
}
</style>