// Basic frontend helper JS - expand as you build UI
document.addEventListener('DOMContentLoaded', ()=>{
  console.log('Street Bull frontend ready');
});

async function fetchPlayers(){
  try{
    const res = await fetch('php/players.php?action=list');
    const data = await res.json();
    return data;
  }catch(e){
    console.error('fetchPlayers error', e);
    return [];
  }
}

// example usage (uncomment to test once PHP backend is configured)
// fetchPlayers().then(players=>console.log(players));
