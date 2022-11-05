// Block editor scripts

/**
 * Editor Setup
 */
wp.domReady( function() {

    /**
     * Updates query loop
     * 
     * Variation of query loop where we include photogallery and posts
     */
    const { registerBlockVariation } = wp.blocks;
    
    const updateList = 'erik/update-list';

    registerBlockVariation( 'core/query', {
        name: updateList,
        title: 'Update List',
        description: 'Displays a list of updates',
        isActive: ( { namespace, query } ) => {
            return (
                namespace === updateList
            );
        },
        attributes: {
            namespace: updateList,
            query: {
                perPage: 10,
                pages: 0,
                offset: 8,
                postType: 'post',
                order: 'desc',
                orderBy: 'date',
                author: '',
                search: '',
                exclude: [],
                sticky: '',
                inherit: false,
                updateList: true
            },
        },
        scope: [ 'inserter' ]
    });

} );