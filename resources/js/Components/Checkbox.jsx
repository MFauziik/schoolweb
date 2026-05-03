export default function Checkbox({ className = '', ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                'rounded-lg border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500 transition duration-150 ease-in-out ' +
                className
            }
        />
    );
}
