const formDefault = {
    // Door section
    door: {
        type: '', // 1 = blindada, 0 = no blindada
        files: []
    },
    
    // Receiver section
    receiver: {
        size: '',
        sideboard: 0, // Aparador: 1 = yes, 0 = no
        type: '', // Type of closet: 'Empotrado', 'Normal', or empty
        closet: '', // Number of doors for the closet
        storage: 0, // 1 = yes, 0 = no
        take: 0, // Can something be taken out? 1 = yes, 0 = no
        files: []
    },
    
    // Other sections as needed
    
    // List for deleted items
    trash: []
};