export const viewDateReservation = (start, end) => {
    start = start.split(' ');
    const startDate = start[0].split('-');
    const startTime = start[1].split(':');

    end = end.split(' ');
    const endDate = end[0].split('-');
    const endTime = end[1].split(':');

    if(startDate[0] === endDate[0] && startDate[1] && endDate[1] && startDate[2] === endDate[2])
        return `Le ${startDate[2]}/${startDate[1]}/${startDate[0]} de ${startTime[0]}h${startTime[1]} à ${endTime[0]}h${endTime[1]}`;
    else
        return `Du ${startDate[2]}/${startDate[1]}/${startDate[0]} à ${startTime[0]}h${startTime[1]} au ${endDate[2]}/${endDate[1]}/${endDate[0]} à ${endTime[0]}h${endTime[1]}`;
}

export const totalBooking = (booking) => {

    let total = booking.price;

    booking.material_options.forEach(e => {
        total += e.price;
    });

    return  total / 100;
}