export default {

    // ✅ Dashboard
    dashboard: route('dashboard'),

    // ✅ Visitor Management
    visitor: {
        index: route('visitor.index'),
        form: route('visitor.form'),
        invite: route('visitor.invite'),
        reinvite: id => route('visitor.reinvite', id),
        update: id => route('visitor.update', id),
        delete: id => route('visitor.destroy', id),
        search: route('visitor.search'),
        checkIn: id => route('visitor.checkin', id),
        checkOut: id => route('visitor.checkout', id),
        movements: id => route('visitor.movements', id),

        // ✅ NEW route for meeting details
        meetingDetails: movementId => route('visitor.meeting.details', movementId),
    },


    // ✅ Users Module
    users: {
        index: route('admin.users.index'),
        create: route('admin.users.create'),
        store: route('admin.users.store'),
        edit: (id) => route('admin.users.edit', id),
        update: (id) => route('admin.users.update', id),
        delete: (id) => route('admin.users.destroy', id),
        toggleStatus: (id) => route('admin.users.toggleStatus', id),
    },


    // ✅ Roles Module
    roles: {
        index: route('admin.roles.index'),
        create: route('admin.roles.create'),
        store: route('admin.roles.store'),
        edit: (id) => route('admin.roles.edit', id),
        update: (id) => route('admin.roles.update', id),
        delete: (id) => route('admin.roles.delete', id),
    },


    // ✅ Logs
    logs: {
        index: route('admin.logs.index'),
    },

    // ✅ Common fields
    common: {
        // Departments CRUD
        departments: {
            index: route('common.departments.index'),
            store: route('common.departments.store'),
            show: (id) => route('common.departments.show', id),
            update: (id) => route('common.departments.update', id),
            delete: (id) => route('common.departments.destroy', id),
        },

        // Buildings CRUD
        buildings: {
            index: route('common.buildings.index'),
            store: route('common.buildings.store'),
            show: (id) => route('common.buildings.show', id),
            update: (id) => route('common.buildings.update', id),
            delete: (id) => route('common.buildings.destroy', id),
            toggleStatus: id => route('common.buildings.toggleStatus', id),
        },

        // Floors CRUD
        floors: {
            index: route('common.floors.index'),
            store: route('common.floors.store'),
            show: (id) => route('common.floors.show', id),
            update: (id) => route('common.floors.update', id),
            delete: (id) => route('common.floors.destroy', id),
            toggleStatus: id => route('common.floors.toggleStatus', id),

        },

        // Location Types CRUD

        locationTypes: {
            index: route('common.location-types.index'),
            store: route('common.location-types.store'),
            update: id => route('common.location-types.update', id),
            delete: id => route('common.location-types.destroy', id),
        }
        ,

        // Locations CRUD
        locations: {
            index: route('common.locations.index'),
            store: route('common.locations.store'),
            update: (id) => route('common.locations.update', id),
            delete: (id) => route('common.locations.destroy', id),
        },
    }

};
