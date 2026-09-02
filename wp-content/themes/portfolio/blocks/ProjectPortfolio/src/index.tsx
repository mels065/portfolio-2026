import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import ProjectPortfolio from './component';

registerBlockType('portfolio/project-portfolio', {
  edit: ({ attributes = { title: 'Projects' }, setAttributes }: IProjectPortfolioAttributesState) => {
    return (
      <>
        <InspectorControls>
          <PanelBody title="Content">
            <TextControl
              label="Title"
              value={attributes.title}
              onChange={(value: string) => setAttributes({ title: value })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...useBlockProps()}>
          <ProjectPortfolio attributes={attributes} setAttributes={setAttributes} />
        </div>
      </>
    );
  },

  save: ({ attributes = {} }) => {
    const blockProps = useBlockProps.save();

    return (
      <div {...blockProps}>
        <ProjectPortfolio attributes={attributes} />
      </div>
    );
  },
});
